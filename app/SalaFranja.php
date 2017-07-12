<?php

namespace Intranet;

use Illuminate\Database\Eloquent\Model;

class SalaFranja extends Model
{
    protected $table = 'sala_franja';
    protected $fillable = ['start', 'end', 'sala_id', 'franja_id', 'user_id'];
}
