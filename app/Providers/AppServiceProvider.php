<?php

namespace App\Providers;

use App\Config;
use App\User;
use App\countries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        //
        $this->getPaths();
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function getPaths()
    {
        $image_path = Config::whereName('image_dir')->first();

        $thumb_image_path = Config::whereName('thumbnail_image_dir')->first();
        View::share(['image_path' => $image_path, 'thumb_image_path' => $thumb_image_path]);

        view()->composer('*', function ($view) {
            $user_details = User::whereId(Auth::user()['id'])->first();
            $country = countries::whereId($user_details['country_id'])->get()->first();
            // dd($user_details);
            $view->with(['user_details' => $user_details, 'country' => $country]);
        });
    }
}
