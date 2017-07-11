<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ImagenesProductos
 * @package Intranet\Models\Panel
 * @version July 9, 2017, 2:37 pm UTC
 */
class ImagenesProductos extends Model
{
    use SoftDeletes;

    public $table = 'imagenes_productos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'imagen',
        'product_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'imagen' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
