<?php

namespace App\Repositories;

use App\Models\Comentario;
use InfyOm\Generator\Common\BaseRepository;

class ComentarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'cuerpo',
        'tema_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comentario::class;
    }
}
