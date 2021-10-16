<?php

namespace Squire;

use Illuminate\Contracts\Validation;
use Illuminate\Database\Eloquent\Builder;

abstract class Rule implements Validation\Rule
{
    protected string $column = 'id';

    protected string $message;

    public function __construct(?string $column = null)
    {
        if ($column) {
            $this->column = $column;
        }
    }

    public function message(): string
    {
        return __($this->message);
    }

    public function passes($attribute, $value): bool
    {
        return $this->getQueryBuilder()->where($this->column, $value)->exists();
    }

    abstract protected function getQueryBuilder(): Builder;
}
