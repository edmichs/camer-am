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
        \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
//    public function register()
//    {
//        if ($this->app->environment() !== 'production') {
//            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
//            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
//        }
//        // ...
//    }
}
