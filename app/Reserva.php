<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;
use Intranet\User;
use Intranet\Franja;
use Intranet\Sala;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $fillable = ['user_id', 'sala_id', 'franja_id', 'status', 'fecha'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    } 

    public function franja() 
    {
        return $this->belongsTo(SalaFranja::class);
    } 

    public function sala() 
    {
        return $this->belongsTo(Salas::class, 'sala_id');
    } 
}
