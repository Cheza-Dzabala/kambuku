<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\categories;

class NewClassifiedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */


    public function boot()
    {
        //
        $this->categories();
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

    private function categories()
    {
        view()->composer('classifieds.category_modal', function ($view) {
            $categories = categories::where('id', '!=', '1')->get()->toArray();
            $view->with('categories', $categories);
        });
    }
}
