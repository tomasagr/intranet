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
    	return $this->hasMany(Sector::class);
    }
}
