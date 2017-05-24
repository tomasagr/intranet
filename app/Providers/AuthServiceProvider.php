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
    }
}
