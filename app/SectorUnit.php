<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;

class SectorUnit extends Model
{
    protected $table = 'sector_unit';
    protected $fillable = ['unit_id', 'sector_id'];
}
