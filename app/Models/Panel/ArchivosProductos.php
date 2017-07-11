<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ArchivosProductos
 * @package Intranet\Models\Panel
 * @version July 9, 2017, 2:37 pm UTC
 */
class ArchivosProductos extends Model
{
    use SoftDeletes;

    public $table = 'archivos_productos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'archivo',
        'producto_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'archivo' => 'string',
        'producto_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required'
    ];

    
}
