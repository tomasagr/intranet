<?php

namespace Intranet\Policies;

use Intranet\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;



    public function index(User $user) {
         return $user->rol->permissions->first(function($element) {
                return $element->tag == 'SHOW_USERS';
            });
    }
    /**
     * Determine whether the user can view the user.
     *
     * @param  \Intranet\User  $user
     * @param  \Intranet\User  $user
     * @return mixed
     */
    public function view(User $user, User $user)
    {
        //
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \Intranet\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->rol->permissions->first(function($element) {
            return $element->tag == 'CREATE_USERS';
        });
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \Intranet\User  $user
     * @param  \Intranet\User  $user
     * @return mixed
     */
    public function update(User $user, User $user)
    {
        //
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \Intranet\User  $user
     * @param  \Intranet\User  $user
     * @return mixed
     */
    public function delete(User $user, User $user)
    {
        //
    }
}
