<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        Auth::provider('external', function ($app, array $config) {
//            return new MyAuthProvider();
//        });
//        Auth::extend('jwt', function (Application $app, string $name, array $config) {
//            // Return an instance of Illuminate\Contracts\Auth\Guard...
//
//            return new JwtGuard(Auth::createUserProvider($config['provider']));
//        });
    }
}
