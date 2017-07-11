<?php

namespace Intranet\Repositories;

use Intranet\Models\Sectores;
use InfyOm\Generator\Common\BaseRepository;

class SectoresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'unit_id',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sectores::class;
    }
}
