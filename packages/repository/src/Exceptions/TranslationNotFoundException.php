<?php

namespace Squire\Exceptions;

use Exception;

class TranslationNotFoundException extends Exception
{
    public function __construct(string $name, string $locale)
    {
        parent::__construct(
            "Unable to locate [{$locale}] translation for the [{$name}] Squire source."
        );
    }
}
