<?php

namespace App\Providers;

use App\categories;
use App\cities;
use Illuminate\Support\ServiceProvider;

class SearchBarProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('partials.bottom_header', function ($view){
           $search_categories = categories::orderBy('name', 'ASC')->get();
           $search_locations = cities::orderBy('name', 'ASC')->where('country_id', '=', '4')->get();
           $view->with(['categories' => $search_categories, 'cities' => $search_locations]);
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
