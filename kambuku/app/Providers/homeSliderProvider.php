<?php

namespace App\Providers;

use App\homeSliders;
use Illuminate\Support\ServiceProvider;

class homeSliderProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('partials.slider', function ($view){
            $slides = homeSliders::orderBy('order', 'ASC')
                ->whereIs_active('1')->get();

            $view->with('slides', $slides);
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
