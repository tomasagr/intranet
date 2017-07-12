<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Eventos
 * @package App\Models\Panel
 * @version May 19, 2017, 11:33 am UTC
 */
class Eventos extends Model
{
    use SoftDeletes;

    public $table = 'eventos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'cuerpo',
        'fecha',
        'hora',
        'tipo',
        'is_birthday'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'cuerpo' => 'string',
        'hora' => 'string',
        'tipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'cuerpo' => 'required',
        'fecha' => 'required',
        'hora' => 'required',
        'tipo' => 'required'
    ];

    
}
