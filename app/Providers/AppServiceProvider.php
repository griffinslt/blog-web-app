<?php

namespace App\Providers;

use App\Http\JokeGeneratorService;
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
        app()->singleton('App\Http\JokeGeneratorService', function ($app) {
            return new JokeGeneratorService("https://official-joke-api.appspot.com/random_joke");
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
