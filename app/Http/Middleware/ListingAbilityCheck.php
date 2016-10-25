<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ListingAbilityCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()['canList'] == '1')
        {
            return $next($request);
        }else{
            Session::flash('CantList', 'You need to be a Kambuku.com partner to post Listings');
            return redirect()->back();
        }

    }
}
