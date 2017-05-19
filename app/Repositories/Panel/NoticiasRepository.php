<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\Noticias;
use InfyOm\Generator\Common\BaseRepository;

class NoticiasRepository extends BaseRepository
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
        return Noticias::class;
    }
}
