<?php

namespace App\Providers;

use App\User\UserRepository;
use Github\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('UserGithubClient', function ($app) {
            return (new Client())->api('user');
        });
        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository($app->make('UserGithubClient'));
        });
    }
}
