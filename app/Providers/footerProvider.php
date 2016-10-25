<?php

namespace App\Providers;

use App\contentHeaders;
use App\contentPages;
use Illuminate\Support\ServiceProvider;

class footerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('partials.footer', function ($view){

            $contentHeader = contentHeaders::orderBy('order', 'ASC')->whereIs_active('1')->get();

            $pages = [];

            foreach ($contentHeader as $content)
            {
                $contentPage = contentPages::orderBy('order', 'ASC')->whereHeader_id($content->id)->get()->toArray();

               $pages = array_add($pages, $content->title, $contentPage);
            }


            $view->with('pages', $pages);
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
