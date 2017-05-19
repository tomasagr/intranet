<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\Contenido;
use InfyOm\Generator\Common\BaseRepository;

class ContenidoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'cuerpo',
        'image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Contenido::class;
    }
}
