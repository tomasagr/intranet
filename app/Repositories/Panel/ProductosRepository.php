<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\Productos;
use InfyOm\Generator\Common\BaseRepository;

class ProductosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'logo',
        'aplicaciones_titulo',
        'aplicaciones_descripcion',
        'ventajas',
        'category_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Productos::class;
    }
}
