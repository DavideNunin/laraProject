<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAuth', function ($user){
            return $user->isAuth();
        });

        Gate::define('isLocatore', function ($user) {
            return $user->hasRole('l');
        });

        Gate::define('isLocatario', function ($user) {
            return $user->hasRole('s');
        });

        Gate::define('isAdmin', function ($user) {
            return $user->hasRole('a');
        });

    }
}
