<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $users = new User;
        view()->composer('app', function($view) {
            $users = User::all();
            $view->with('users', $users->id);
        });
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
