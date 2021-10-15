<?php

namespace Squire\Tests;

use Illuminate\Support\Collection;

class DataConsistencyTest extends TestCase
{
    protected const PACKAGES_DIRECTORY = "./packages/";

    /** @test */
    public function are_data_files_consistent(): void
    {
        $packages = collect(glob(static::PACKAGES_DIRECTORY . "*", GLOB_ONLYDIR))
            ->filter(fn(string $name) => $this->isTranslatedPackageDirectory($name))
            ->map(fn(string $name) => str_replace(static::PACKAGES_DIRECTORY, "", $name))
            ->groupBy(function (string $name) {
                $parts = explode("-", $name);
                unset($parts[count($parts) - 1]);
                return implode("-", $parts);
            });

        $packages->each(function (Collection $translations, string $package) {
            if ($translations->count() > 1) {
                $previous = null;
                $translations->each(function (string $translation) use ($package, &$previous) {
                    $lines = count(explode("\n", file_get_contents(static::PACKAGES_DIRECTORY . $translation . "/resources/data.csv")));
                    if (!is_null($previous)) {
                        $this->assertSame($lines, $previous, "Number of data entires in $package is not the same for translations ($translation).");
                    }
                    $previous = $lines;
                });
            }
        });
    }

    protected function isTranslatedPackageDirectory(string $name): bool
    {
        $parts = explode("-", $name);
        return count($parts) > 1 && strlen($parts[count($parts) - 1]) === 2;
    }
}
