<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use App\classifieds;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class ProfileListingsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Request $request
     */


    public function boot(Request $request)
    {
        //

        view()->composer('partials.Account.listings', function ($view) {


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
