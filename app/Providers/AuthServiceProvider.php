<?php

namespace Intranet\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Intranet\Model' => 'Intranet\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-user', function($user) {
            return $user->rol->permissions->first(function($element) {
                return $element->tag == 'SHOW_USERS';
            });
        });

        Gate::define('edit-user', function($user) {
            return $user->rol->permissions->first(function($element) {
                return $element->tag == 'UPDATE_USERS';
            });
        });

        Gate::define('topic', function($user, $tema) {
            if ($tema->privado == 1) {
                $isAuthor = $tema->author_id == \Auth::user()->id;

                $isUser = $tema->users->first(function($element) {
                    return $element->user_id == \Auth::user()->id;
                });
               
                return $isAuthor || $isUser || \Auth::user()->rol_id == 1;
            }
            return true;
        });
    }
}
