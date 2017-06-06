<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\Models\Slider;
/**
 * Class Contenido
 * @package App\Models\Panel
 * @version May 19, 2017, 9:18 am UTC
 */
class Contenido extends Model
{
    use SoftDeletes;

    public $table = 'contenidos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'cuerpo',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'cuerpo' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'cuerpo' => 'required'
    ];

    public function images () 
    {
        return $this->hasMany(Slider::class);
    }
}
