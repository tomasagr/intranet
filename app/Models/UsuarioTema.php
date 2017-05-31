<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UsuarioTema
 * @package App\Models
 * @version May 31, 2017, 6:06 pm UTC
 */
class UsuarioTema extends Model
{
    use SoftDeletes;

    public $table = 'usuario_temas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tema_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tema_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tema_id' => 'required',
        'user_id' => 'required'
    ];

    
}
