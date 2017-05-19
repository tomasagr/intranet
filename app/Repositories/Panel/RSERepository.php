<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\RSE;
use InfyOm\Generator\Common\BaseRepository;

class RSERepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'cuerpo',
        'puesto',
        'ubicacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RSE::class;
    }
}
