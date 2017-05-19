<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\Curiosidades;
use InfyOm\Generator\Common\BaseRepository;

class CuriosidadesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Curiosidades::class;
    }
}
