<?php

namespace App\Repositories;

use App\Models\Tema;
use InfyOm\Generator\Common\BaseRepository;

class TemaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'cuerpo',
        'privado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tema::class;
    }
}
