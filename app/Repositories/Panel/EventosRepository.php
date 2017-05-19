<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\Eventos;
use InfyOm\Generator\Common\BaseRepository;

class EventosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'cuerpo',
        'fecha',
        'hora',
        'tipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Eventos::class;
    }
}
