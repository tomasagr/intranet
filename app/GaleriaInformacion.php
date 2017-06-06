<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;

class GaleriaInformacion extends Model
{
    protected $table = 'galeria_informacion';
    protected $fillable = ['texto', 'titulo'];
}
