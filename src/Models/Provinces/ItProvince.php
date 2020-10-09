<?php

namespace Squire\Models\Provinces;

use Squire\Model;
use Squire\Models\Region;

class ItProvince extends Model
{
    protected $source = 'provinces/it';

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
