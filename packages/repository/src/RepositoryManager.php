<?php

namespace Squire;

use Illuminate\Support\Facades\App;
use Squire\Exceptions\SourceNotFoundException;
use Squire\Exceptions\TranslationNotFoundException;

class RepositoryManager
{
    protected $sources = [];

    public function fetchData($name, $locale = null)
    {
        $source = $this->getSource($name, $locale);

        return $this->fetchDataFromSource($source);
    }

    public function fetchDataFromSource($source)
    {
        return file($source);
    }

    public function getLocale($name)
    {
        $appLocale = App::getLocale();
        if ($this->sourceIsRegistered($name, $appLocale)) return $appLocale;

        $appFallbackLocale = config('app.fallback_locale');
        if ($this->sourceIsRegistered($name, $appFallbackLocale)) return $appFallbackLocale;

        return array_key_first($this->getSources($name));
    }

    public function getSource($name, $locale = null)
    {
        if ($locale && ! $this->sourceIsRegistered($name, $locale))
            throw new TranslationNotFoundException($name, $locale);

        if (! $locale) $locale = $this->getLocale($name);

        return $this->getSources($name)[$locale];
    }

    public function getSources($name = null)
    {
        if (! $name) return $this->sources;

        if (! $this->sourceIsRegistered($name) || ! count($this->sources[$name]))
            throw new SourceNotFoundException($name);

        return $this->sources[$name];
    }

    public function registerSource($name, $locale, $path)
    {
        if (! $this->sourceIsRegistered($name)) $this->sources[$name] = [];

        $this->sources[$name][$locale] = realpath($path);
    }

    public function sourceIsRegistered($name, $locale = null)
    {
        if (! $locale) return array_key_exists($name, $this->sources);

        return array_key_exists($name, $this->sources) && array_key_exists($locale, $this->sources[$name]);
    }
}