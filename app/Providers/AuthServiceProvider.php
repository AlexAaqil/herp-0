<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Define your model policies here, if you have any.
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // "view-as-admin" gate
        Gate::define('view-as-admin', function (User $user) {
            return in_array($user->user_level, [0, 1]);
        });

        // "view-as-storekeeper" gate
        Gate::define('view-as-storekeeper', function (User $user) {
            return in_array($user->user_level, [4]);
        });

        Gate::define('view-as-accountant', function (User $user) {
            return in_array($user->user_level, [2]);
        });
    }
}
