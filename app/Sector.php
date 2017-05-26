<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;
use Intranet\Unit;

class Sector extends Model
{
    protected $table = 'sectors';
    protected $fillable = ['name', 'unit_id'];

    public function units()
    {
    	return $this->belongsToMany(Unit::class, 'sector_unit', 'sector_id', 'unit_id');
    }
}
