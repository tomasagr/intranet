<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Avisos
 * @package App\Models\Panel
 * @version June 2, 2017, 1:10 pm UTC
 */
class Avisos extends Model
{
    use SoftDeletes;

    public $table = 'avisos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo'
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
        'titulo' => 'required'
    ];

    
}
