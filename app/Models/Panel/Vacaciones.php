<?php

namespace Intranet\Models\Panel;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\User;

/**
 * Class Vacaciones
 * @package App\Models\Panel
 * @version May 19, 2017, 11:39 am UTC
 */
class Vacaciones extends Model
{
    use SoftDeletes;

    public $table = 'vacaciones';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'cuerpo',
        'fecha',
        'hora',
        'user_id',
        'to_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'cuerpo' => 'string',
        'hora' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'cuerpo' => 'required',
        'fecha' => 'required',
        'user_id' => 'required'
    ];



    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
