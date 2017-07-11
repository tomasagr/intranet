<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\Models\Panel\ArchivosProductos;
use Intranet\Models\Panel\ImagenesProductos;

/**
 * Class Productos
 * @package App\Models\Panel
 * @version July 9, 2017, 2:17 pm UTC
 */
class Productos extends Model
{
    use SoftDeletes;

    public $table = 'productos';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'logo',
        'aplicaciones_titulo',
        'aplicaciones_descripcion',
        'ventajas',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'logo' => 'string',
        'aplicaciones_titulo' => 'string',
        'aplicaciones_descripcion' => 'string',
        'ventajas' => 'string',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'aplicaciones_titulo' => 'required',
        'aplicaciones_descripcion' => 'required',
        'ventajas' => 'required'
    ];

    public function category()
    {
        return $this->belongsTo('Intranet\CategoryProduct');
    }

    public function archivos()
    {
        return $this->hasMany(ArchivosProductos::class, 'producto_id', 'id');
    }

    public function imagenes()
    {
        return $this->hasMany(ImagenesProductos::class, 'product_id', 'id');
    }
}
