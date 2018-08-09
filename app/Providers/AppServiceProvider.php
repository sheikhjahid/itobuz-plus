<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind('App\Contracts\UserInterface', 'App\Repositories\UserRepository');
        $this->app->bind('App\Contracts\TeamInterface', 'App\Repositories\TeamRepository');
        $this->app->bind('App\Contracts\RoleInterface', 'App\Repositories\RoleRepository');
        $this->app->bind('App\Contracts\LeaveInterface', 'App\Repositories\LeaveRepository');
    }
}
