<?php

namespace App\Providers;

use App\search_terms;
use Illuminate\Support\ServiceProvider;

class searchTermProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('partials.most_searched', function ($view){

            $most_searched = search_terms::orderBy('count', 'DESC')->take(8)->get();

            $view->with(['most_searched' => $most_searched]);

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
