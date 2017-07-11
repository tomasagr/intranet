<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\ImagenesProductos;
use InfyOm\Generator\Common\BaseRepository;

class ImagenesProductosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'imagen'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ImagenesProductos::class;
    }
}
