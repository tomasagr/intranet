<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\Informacion;
use InfyOm\Generator\Common\BaseRepository;

class InformacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'imagen',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Informacion::class;
    }
}
