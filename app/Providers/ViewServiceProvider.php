<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use App\categories;
use App\sub_categories;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * @var categories
     */


    /**
     * Bootstrap the application services.
     *
     * @return void
     */


    public function boot(Router $router)
    {
        //
        $this->compose_category_sidebar();





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

    private function compose_category_sidebar()
    {
        view()->composer('partials.category_sidebar', function ($view) {

            $categories = array();

            $maincat = categories::orderBy('display_order', 'ASC')->where('id', '!=', '1')->get();

            foreach ($maincat as $key => $value) {
                $subcat = sub_categories::where('category_id', '=', $value['id'])->get();
                $categories = array_add($categories, $value['name'], $subcat->toArray());
            }

            $view->with('categories', $categories);
        });
    }



    /**
     * @return array of categories and sub categories
     */

}
