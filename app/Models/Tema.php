<?php

namespace Intranet\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intranet\User;
/**
 * Class Tema
 * @package App\Models
 * @version May 31, 2017, 6:03 pm UTC
 */
class Tema extends Model
{
    use SoftDeletes;

    public $table = 'temas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'cuerpo',
        'privado',
        'author_id',
        'foro_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'cuerpo' => 'string',
        'privado' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'cuerpo' => 'required',
        'privado' => 'required'
    ];

    public function users() 
    {
        return $this->belongsToMany(User::class, 'usuario_tema', 'tema_id', 'user_id');
    }

    public function autor() 
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function foro() 
    {
        return $this->belongsTo(Foro::class, 'foro_id');
    }

    public function comentario() 
    {
        return $this->hasMany(Comentario::class, 'tema_id')
            ->orderBy('created_at', 'desc');
    }
}
