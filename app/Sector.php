<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;
use Intranet\Unit;
use Intranet\User;

class Sector extends Model
{
    protected $table = 'sectors';
    protected $fillable = ['name', 'unit_id'];

    public function units()
    {
    	return $this->belongsToMany(Unit::class, 'sector_unit', 'sector_id', 'unit_id');
    }

    public function users()
    {
    	return $this->hasMany(User::class, 'sector_id', 'id');
    }
}
