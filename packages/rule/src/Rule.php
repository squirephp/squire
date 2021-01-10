<?php

namespace Squire;

use Illuminate\Contracts\Validation\Rule as RuleContract;
use Illuminate\Support\Facades\Validator;

class Rule implements RuleContract
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
        return __($this->message, [
            'attribute' => $this->attribute,
            'column' => $this->column,
        ]);
    }

    public function passes($attribute, $value)
    {
        return $this->getQueryBuilder()->where($this->column, $value)->exists();
    }

    public static function register($name)
    {
        $rule = (new static($parameters[0] ?? (new static)->column));

        Validator::extend($name, function ($attribute, $value, $parameters, $validator) use ($rule) {
            return $rule->passes($attribute, $value);
        }, $rule->message());
    }
}