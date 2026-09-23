<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Module-based access gates
        Gate::define('access-dashboard', function (User $user) {
            return $user->role && $user->role->can_dashboard;
        });

        Gate::define('access-department', function (User $user) {
            return $user->role && $user->role->can_department;
        });

        Gate::define('access-user', function (User $user) {
            return $user->role && $user->role->can_user;
        });

        Gate::define('access-role', function (User $user) {
            return $user->role && $user->role->can_role;
        });
    }
}
