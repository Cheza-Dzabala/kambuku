<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\classifieds;
class DashboardProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->stats();
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

    public function stats(){
        view()->composer('admin.partials.dashboard.widgets', function($view){
            $stats = array();
            $users_array = array();
            $listings_array = array();

            $users = User::count();

            $active_users = User::whereIs_active('1')->count();
            if($active_users != 0)
            {
                $percentage_active_users = ($active_users / $users) * 100;
            }else{
                $percentage_active_users = 0;
            }


            $users_array = array_add($users_array, 'total', $users);
            $users_array = array_add($users_array, 'percentage', $percentage_active_users);

            $stats = array_add($stats, 'users', $users_array);


            $listings = classifieds::count();
            $active_listings = classifieds::whereIs_active('1')->count();

            if($active_listings != 0)
            {
                $percentage_active_listings = ($active_listings / $listings) * 100;
            }else{
                $percentage_active_listings = 0;
            }


            $listings_array = array_add($listings_array, 'total', $active_listings);
            $listings_array = array_add($listings_array, 'percentage', $percentage_active_listings);

            $stats = array_add($stats, 'listings', $listings_array);

       //        dd($stats);

            return $view->with('stats', $stats);
        });
    }
}
