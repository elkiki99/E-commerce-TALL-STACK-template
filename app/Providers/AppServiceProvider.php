<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind('path.public', function () {
        //     return base_path() . '/public_html';
        // });

        // app()->usePublicPath(base_path() . '/public_html');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('dashboard', function (User $user) {
            return $user->admin === 1;
        });
    }
}
