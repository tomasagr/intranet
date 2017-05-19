<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\Manuales;
use InfyOm\Generator\Common\BaseRepository;

class ManualesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'cuerpo',
        'opcion1',
        'opcion2',
        'type',
        'sector_id',
        'link',
        'file'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Manuales::class;
    }
}
