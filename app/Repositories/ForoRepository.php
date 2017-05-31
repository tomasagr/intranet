<?php

namespace Intranet\Repositories;

use Intranet\Models\Foro;
use InfyOm\Generator\Common\BaseRepository;

class ForoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Foro::class;
    }
}
