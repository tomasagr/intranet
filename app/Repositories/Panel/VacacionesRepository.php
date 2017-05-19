<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\Vacaciones;
use InfyOm\Generator\Common\BaseRepository;

class VacacionesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'cuerpo',
        'fecha',
        'hora',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vacaciones::class;
    }
}
