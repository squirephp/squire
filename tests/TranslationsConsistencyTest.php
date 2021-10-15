<?php

namespace Squire\Tests;

use Illuminate\Support\Collection;

class TranslationsConsistencyTest extends TestCase
{
    protected const PACKAGES_DIRECTORY = './packages/';

    /** @test */
    public function are_data_files_consistent(): void
    {
        collect(glob(static::PACKAGES_DIRECTORY . '*', GLOB_ONLYDIR))
            ->filter(fn (string $name): bool => $this->isTranslatedPackageDirectory($name))
            ->map(fn (string $name): string => str_replace(static::PACKAGES_DIRECTORY, '', $name))
            ->groupBy(function (string $name): string {
                $parts = explode('-', $name);
                unset($parts[count($parts) - 1]);
                
                return implode('-', $parts);
            })
            ->filter(fn (Collection $translations): bool => $translations->count() > 1)
            ->each(function (Collection $translations, string $package): void {
                $previous = null;
                
                $translations->each(function (string $translation) use ($package, &$previous) {
                    $lines = count(explode('\n', file_get_contents(static::PACKAGES_DIRECTORY . $translation . '/resources/data.csv')));
                    
                    if ($previous !== null) {
                        $this->assertSame($lines, $previous, "Number of data entires in {$package} is not the same for translations ($translation).");
                    }
                    
                    $previous = $lines;
                });
            });
    }

    protected function isTranslatedPackageDirectory(string $name): bool
    {
        $parts = explode('-', $name);
        
        if (count($parts) <= 1) {
            return false;
        }
            
        return strlen($parts[count($parts) - 1]) === 2;
    }
}
