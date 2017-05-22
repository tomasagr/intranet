<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\User;

/**
 * Class RSE
 * @package App\Models\Panel
 * @version May 19, 2017, 11:22 am UTC
 */
class RSE extends Model
{
    use SoftDeletes;

    public $table = 'r_s_e_s';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'cuerpo',
        'puesto',
        'ubicacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'cuerpo' => 'string',
        'puesto' => 'string',
        'ubicacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'cuerpo' => 'required',
        'puesto' => 'required',
        'ubicacion' => 'required'
    ];

    public function users() 
    {
        return $this->belongsToMany(User::class, 'user_job', 'job_id', 'user_id');
    }    
}
