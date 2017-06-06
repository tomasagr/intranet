<?php

namespace Intranet\Repositories;

use Intranet\Models\Slider;
use InfyOm\Generator\Common\BaseRepository;

class SliderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contenido_id',
        'imagen'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Slider::class;
    }
}
