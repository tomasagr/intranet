<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;
use Intranet\SalaFranja;

class Salas extends Model
{
    protected $table = 'salas';

    public function franja() 
    {
        return $this->hasMany(SalaFranja::class, 'sala_id')->orderBy('start');
    }

    public function reservas() 
    {
        return $this->hasMany(Reserva::class, 'sala_id');
    }
}
