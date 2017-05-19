<?php

namespace Intranet\Repositories\Panel;

use Intranet\Models\Panel\Videos;
use InfyOm\Generator\Common\BaseRepository;

class VideosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
        'link'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Videos::class;
    }
}
