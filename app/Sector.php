<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectors';
    protected $fillable = ['name', 'unit_id'];
}
