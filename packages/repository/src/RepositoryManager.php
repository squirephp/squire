<?php

namespace Squire;

use Illuminate\Support\Facades\App;
use Squire\Exceptions\SourceNotFoundException;
use Squire\Exceptions\TranslationNotFoundException;

class RepositoryManager
{
    protected array $sources = [];

    public function fetchData(string $name, ?string $locale = null): array
    {
        $source = $this->getSource($name, $locale);

        return $this->fetchDataFromSource($source);
    }

    public function getSource(string $name, ?string $locale = null): string
    {
        if ($locale && ! $this->sourceIsRegistered($name, $locale)) {
            throw new TranslationNotFoundException($name, $locale);
        }

        if (! $locale) {
            $locale = $this->getLocale($name);
        }

        return $this->getSources($name)[$locale];
    }

    public function sourceIsRegistered(string $name, ?string $locale = null): bool
    {
        if (! $locale) {
            return array_key_exists($name, $this->sources);
        }

        return array_key_exists($name, $this->sources) && array_key_exists($locale, $this->sources[$name]);
    }

    public function getLocale(string $name): string
    {
        if ($this->sourceIsRegistered($name, $appLocale = App::getLocale())) {
            return $appLocale;
        }

        if ($this->sourceIsRegistered($name, $appFallbackLocale = config('app.fallback_locale'))) {
            return $appFallbackLocale;
        }

        return array_key_first($this->getSources($name));
    }

    public function getSources(?string $name = null): array | string
    {
        if (! $name) {
            return $this->sources;
        }

        if (! $this->sourceIsRegistered($name) || ! count($this->sources[$name])) {
            throw new SourceNotFoundException($name);
        }

        return $this->sources[$name];
    }

    public function fetchDataFromSource($source): array
    {
        return file($source);
    }

    public function registerSource(string $name, string $locale, string $path): void
    {
        if (! $this->sourceIsRegistered($name)) {
            $this->sources[$name] = [];
        }

        $this->sources[$name][$locale] = realpath($path);
    }
}
