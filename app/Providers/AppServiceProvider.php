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
        Gate::define('admin', function (User $user) {
            return $user->role && strtolower($user->role->name) === 'admin';
        });

        Gate::define('create', function (User $user) {
            if ($user->role && strtolower($user->role->name) === 'admin') return true;
            return $user->role && $user->role->can_create;
        });

        Gate::define('read', function (User $user) {
            if ($user->role && strtolower($user->role->name) === 'admin') return true;
            return $user->role && $user->role->can_read;
        });

        Gate::define('update', function (User $user) {
            if ($user->role && strtolower($user->role->name) === 'admin') return true;
            return $user->role && $user->role->can_update;
        });

        Gate::define('delete', function (User $user) {
            if ($user->role && strtolower($user->role->name) === 'admin') return true;
            return $user->role && $user->role->can_delete;
        });
    }
}
