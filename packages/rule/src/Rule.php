<?php

namespace Squire;

use Illuminate\Contracts\Validation;
use Illuminate\Support\Facades\Validator;

class Rule implements Validation\Rule
{
    protected $column = 'id';

    protected $message;

    public function __construct($column = null)
    {
        if ($column) $this->column = $column;
    }

    protected function getQueryBuilder() {}

    public function message()
    {
        return __($this->message);
    }

    public function passes($attribute, $value)
    {
        return $this->getQueryBuilder()->where($this->column, $value)->exists();
    }
}