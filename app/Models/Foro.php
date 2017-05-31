<?php

namespace Intranet\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Foro
 * @package App\Models
 * @version May 31, 2017, 5:58 pm UTC
 */
class Foro extends Model
{
    use SoftDeletes;

    public $table = 'foros';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    public function temas() 
    {
        return $this->hasMany(Tema::class, 'foro_id')
            ->orderBy('created_at', 'desc');
    }
}
