<?php

namespace Squire;

use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionClass;

abstract class Model extends Eloquent\Model
{
    public static array $schema = [];
    protected static array $sqliteConnections = [];
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot(): void
    {
        parent::boot();

        if (static::hasValidCache()) {
            static::setSqliteConnection(static::getCachePath());

            return;
        }

        if (static::isCacheable()) {
            static::cache([
                Repository::getLocale(static::class),
            ]);

            return;
        }

        static::setSqliteConnection(':memory:');

        static::migrate();
    }

    protected static function hasValidCache(?string $locale = null): bool
    {
        $cachedAt = static::getCachedAt($locale);
        $modelUpdatedAt = static::getModelUpdatedAt();
        $sourceUpdatedAt = static::getSourceUpdatedAt($locale);

        return $modelUpdatedAt <= $cachedAt && $sourceUpdatedAt <= $cachedAt;
    }

    protected static function getCachedAt($locale = null): int
    {
        $cachePath = static::getCachePath($locale);

        return file_exists($cachePath) ? filemtime($cachePath) : 0;
    }

    protected static function getCachePath(?string $locale = null): string
    {
        return static::getCacheDirectory() . '/' . static::getCacheFileName($locale);
    }

    protected static function getCacheDirectory(): string
    {
        return realpath(config('squire.cache-path', storage_path('framework/cache')));
    }

    protected static function getCacheFileName(?string $locale = null): string
    {
        $kebabCaseLocale = strtolower(str_replace('_', '-', $locale ?? Repository::getLocale(static::class)));
        $kebabCaseModelClassName = Str::kebab(str_replace('\\', '', static::class));

        return config('squire.cache-prefix', 'squire') . '-' . $kebabCaseModelClassName . '-' . $kebabCaseLocale . '.sqlite';
    }

    protected static function getModelUpdatedAt(): int
    {
        return filemtime((new ReflectionClass(static::class))->getFileName());
    }

    protected static function getSourceUpdatedAt(?string $locale = null): int
    {
        return filemtime(Repository::getSource(static::class, $locale));
    }

    protected static function setSqliteConnection(string $database): void
    {
        static::$sqliteConnections[static::class] = app(ConnectionFactory::class)->make([
            'driver' => 'sqlite',
            'database' => $database,
        ]);
    }

    protected static function isCacheable(): bool
    {
        $cacheDirectory = static::getCacheDirectory();

        return file_exists($cacheDirectory) && is_writable($cacheDirectory);
    }

    public static function cache(array $locales = [])
    {
        if (! count($locales)) {
            $locales = array_keys(Repository::getSources(static::class));
        }

        collect($locales)
            ->filter(fn (string $locale): bool => Repository::sourceIsRegistered(static::class, $locale))
            ->each(function (string $locale): void {
                $cachePath = static::getCachePath($locale);

                file_put_contents($cachePath, '');

                static::setSqliteConnection($cachePath);

                static::migrate($locale);

                $modelUpdatedAt = static::getModelUpdatedAt();
                $sourceUpdatedAt = static::getSourceUpdatedAt($locale);

                touch($cachePath, $modelUpdatedAt >= $sourceUpdatedAt ? $modelUpdatedAt : $sourceUpdatedAt);
            });
    }

    public static function migrate(?string $locale = null): void
    {
        $tableName = (new static())->getTable();

        static::resolveConnection()->getSchemaBuilder()->create($tableName, function (Blueprint $table): void {
            foreach (static::$schema as $name => $type) {
                $table->{$type}($name)->nullable();
            }
        });

        $data = collect(Repository::fetchData(static::class));

        $schema = collect(str_getcsv($data->first()));

        $data->transform(function (string $line) use ($schema): Collection {
            return $schema->combine(
                array_map(fn ($value) => $value !== '' ? $value : null, str_getcsv($line))
            );
        });

        $data->shift();

        foreach (array_chunk($data->toArray(), 100) ?? [] as $dataToInsert) {
            if (empty($dataToInsert)) {
                continue;
            }

            static::insert($dataToInsert);
        }
    }

    public static function resolveConnection($connection = null): SQLiteConnection
    {
        return static::$sqliteConnections[static::class];
    }

    public function usesTimestamps(): bool
    {
        return false;
    }
}
