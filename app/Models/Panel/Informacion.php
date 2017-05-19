<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Informacion
 * @package App\Models\Panel
 * @version May 19, 2017, 12:16 pm UTC
 */
class Informacion extends Model
{
    use SoftDeletes;

    public $table = 'informacions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'imagen',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'imagen' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'imagen' => 'required',
        'descripcion' => 'required'
    ];

    
}
