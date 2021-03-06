<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\Sector;
use Intranet\Category;
/**
 * Class Noticias
 * @package App\Models\Panel
 * @version May 19, 2017, 1:44 am UTC
 */
class Noticias extends Model
{
    use SoftDeletes;

    public $table = 'noticias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'cuerpo',
        'image',
        'sector_id',
        'category_id',
        'visibility'
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
        'cuerpo' => 'required',
        'category_id' => 'required',
        'sector_id' => 'required'
    ];


    public function sector() 
    {
        return $this->belongsTo(Sector::class);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
}
