<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\messagereceivers;

class BottomHeaderProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('partials.bottom_header', function($view){
            $user_id = Auth::user()['id'];
            $messages = messagereceivers::whereuser_id($user_id)
                    ->whereRead_status('0')
                    ->get()
                    ->count();
            //dd($messages);
            if ($messages > 0)
            {
                $view->with('message_count', $messages);
            }else{

                $view;
            }

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
