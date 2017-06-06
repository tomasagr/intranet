<?php

namespace Intranet\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\Models\Panel\Contenido;
/**
 * Class Slider
 * @package App\Models
 * @version June 5, 2017, 11:46 pm UTC
 */
class Slider extends Model
{
    use SoftDeletes;

    public $table = 'sliders';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'contenido_id',
        'imagen'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'contenido_id' => 'integer',
        'imagen' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contenido_id' => 'required'
    ];

    public function contenido() 
    {
        return $this->belongsTo(Contenido::class, 'contenido_id');
    }
}
