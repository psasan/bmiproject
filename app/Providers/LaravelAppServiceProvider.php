<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;



class LaravelAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $halaman = "";
        if(Request::segment(1) == 'bmi'){
            $halaman = 'bmi';
        }
        if(Request::segment(1) == 'user'){
            $halaman = 'user';
        }
        view()->share('halaman', $halaman);
    }
}
