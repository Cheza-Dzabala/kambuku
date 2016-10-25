<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminLeftSideBar extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->load_user_data();
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

    public function load_user_data()
    {
        view()->composer('admin.partials.general.leftsidebar', function($view){
            $user_id = Auth::user()['id'];
            $user_details = User::whereId($user_id)->get()->first();
            return $view->with('user_details', $user_details);
        });
    }
}
