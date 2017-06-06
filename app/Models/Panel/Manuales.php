<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\Sector;
/**
 * Class Manuales
 * @package App\Models\Panel
 * @version May 19, 2017, 11:52 am UTC
 */
class Manuales extends Model
{
    use SoftDeletes;

    public $table = 'manuales';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'cuerpo',
        'opcion1',
        'opcion2',
        'type',
        'sector_id',
        'link',
        'file'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'cuerpo' => 'string',
        'opcion1' => 'string',
        'opcion2' => 'string',
        'type' => 'string',
        'sector_id' => 'integer',
        'link' => 'string',
        'file' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'cuerpo' => 'required',
        'type' => 'required',
        'sector_id' => 'required'
    ];

    public function sector() 
    {
        return $this->belongsTo(Sector::class);
    }
}
