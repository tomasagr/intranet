<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;
use Intranet\Sector;

class Unit extends Model
{
    protected $table = 'units';
    protected $fillable = ['name'];

    public function sectors()
    {
    	return $this->belongsToMany(Sector::class, 'sector_unit', 'unit_id', 'sector_id');
    }
}
