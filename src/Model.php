<?php

namespace Squire;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Sushi\Sushi;

class Model extends EloquentModel
{
    use Sushi;

    protected $map;

    protected $rawData;

    protected $rows;

    protected $schema;

    protected $source;

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
        $this->rawData = collect($this->rawData ?: require __DIR__."/../resources/{$this->source}.php");

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
