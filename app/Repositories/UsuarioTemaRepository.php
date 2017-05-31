<?php

namespace App\Repositories;

use App\Models\UsuarioTema;
use InfyOm\Generator\Common\BaseRepository;

class UsuarioTemaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tema_id',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UsuarioTema::class;
    }
}
