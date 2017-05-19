<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Curiosidades
 * @package App\Models\Panel
 * @version May 19, 2017, 12:17 pm UTC
 */
class Curiosidades extends Model
{
    use SoftDeletes;

    public $table = 'curiosidades';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'descripcion' => 'required'
    ];

    
}
