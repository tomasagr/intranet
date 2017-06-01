<?php

namespace Intranet\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\User;
use Intranet\Models\Tema;

/**
 * Class Comentario
 * @package App\Models
 * @version May 31, 2017, 6:08 pm UTC
 */
class Comentario extends Model
{
    use SoftDeletes;

    public $table = 'comentarios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'cuerpo',
        'tema_id',
        'foro_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'cuerpo' => 'string',
        'tema_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'cuerpo' => 'required',
        'tema_id' => 'required'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id')
            ->orderBy('created_at', 'desc');
    }

    public function tema() 
    {
        return $this->belongsTo(Tema::class);
    }
}
