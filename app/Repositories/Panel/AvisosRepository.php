<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\Avisos;
use InfyOm\Generator\Common\BaseRepository;

class AvisosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Avisos::class;
    }
}
