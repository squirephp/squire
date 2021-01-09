<?php

namespace Squire\Exceptions;

use Exception;

class SourceNotFoundException extends Exception
{
    public function __construct($name)
    {
        parent::__construct(
            "Unable to locate Squire source for [{$name}]"
        );
    }
}