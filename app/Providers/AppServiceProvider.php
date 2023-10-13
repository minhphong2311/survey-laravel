<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Str;

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
     *
     * @return void
     */
    public function boot()
    {
        Str::macro('formatPhone', function ($number)
        {
            return preg_replace("/(\d{3})(\d{4})(\d*)$/", "$1-$2 $3", $number);
        });
        Str::macro('formatIC', function ($number)
        {
            return preg_replace("/(\d{6})(\d{2})(\d*)$/", "$1-$2-$3", $number);
        });
    }
}
