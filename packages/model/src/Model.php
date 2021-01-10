<?php

namespace Squire;

use Illuminate\Database\Eloquent;
use Illuminate\Support\Str;
use Sushi\Sushi;

class Model extends Eloquent\Model
{
    use Sushi;

    public $incrementing = false;

    protected $map;

    protected $rawData;

    protected $schema;

    public static function bootSushi()
    {
        $instance = (new static);

        $cacheFileName = config('sushi.cache-prefix', 'sushi').'-'.Str::kebab(str_replace('\\', '', static::class)).'-'.Repository::getLocale(static::class).'.sqlite';
        $cacheDirectory = realpath(config('sushi.cache-path', storage_path('framework/cache')));
        $cachePath = $cacheDirectory.'/'.$cacheFileName;
        $sourcePath = Repository::getSource(static::class);

        $states = [
            'cache-file-found-and-up-to-date' => function () use ($cachePath) {
                static::setSqliteConnection($cachePath);
            },
            'cache-file-not-found-or-stale' => function () use ($cachePath, $sourcePath, $instance) {
                file_put_contents($cachePath, '');

                static::setSqliteConnection($cachePath);

                $instance->migrate();

                touch($cachePath, filemtime($sourcePath));
            }
        ];

        switch (true) {
            case file_exists($cachePath) && filemtime($sourcePath) <= filemtime($cachePath):
                $states['cache-file-found-and-up-to-date']();
                break;

            case file_exists($cacheDirectory) && is_writable($cacheDirectory):
                $states['cache-file-not-found-or-stale']();
                break;

            default:
                $states['cache-file-not-found-or-stale']();
                break;
        }
    }

    public function getMap()
    {
        $map = collect($this->map);

        if ($map->count()) return $map;

        return collect($this->rawData->first())->mapWithKeys(function ($value, $columnName) {
            return [$columnName => $columnName];
        });
    }

    public function getRows()
    {
        $this->rawData = collect(Repository::fetchData(static::class));

        $map = $this->getMap();

        return $this->rawData->map(function ($row) use ($map) {
            $record = [];

            foreach ($map as $columnName => $sourceColumnName) {
                $record[$columnName] = $row[$sourceColumnName];
            }

            return $record;
        })->toArray();
    }

    public function getSchema()
    {
        $schema = collect($this->schema ?? []);

        return $this->getMap()
            ->filter(function ($sourceColumnName, $columnName) use ($schema) {
                return $schema->get($sourceColumnName, false);
            })
            ->mapWithKeys(function ($sourceColumnName, $columnName) use ($schema) {
                return [$columnName => $schema->get($sourceColumnName)];
            })->toArray();
    }
}