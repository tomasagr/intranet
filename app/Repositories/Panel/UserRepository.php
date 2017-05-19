<?php

namespace Intranet\Repositories\Panel;

use Intranet\User;
use InfyOm\Generator\Common\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fullname',
        'email',
        'password',
        'position',
        'unit_id',
        'sector_id',
        'bio',
        'avatar',
        'rol_id',
        'status',
        'remember_token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
