<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\ArchivosProductos;
use InfyOm\Generator\Common\BaseRepository;

class ArchivosProductosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'archivo',
        'producto_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ArchivosProductos::class;
    }
}
