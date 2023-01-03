<?php

namespace App\Providers;

use App\Http\JokeGenerator;
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
        app()->singleton('App\Http\JokeGenerator', function ($app) {
            return new JokeGenerator("https://official-joke-api.appspot.com/random_joke");
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
