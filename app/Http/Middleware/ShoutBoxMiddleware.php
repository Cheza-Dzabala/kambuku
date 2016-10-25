<?php

namespace App\Http\Middleware;

use App\CurrentOnline;
use App\Events\ShoutEvent;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;


class ShoutBoxMiddleware
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
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            Session::put('userID', $user_id);
            Event::fire(new ShoutEvent($user_id));
            $current = CurrentOnline::whereUser_id(Auth::user()->id)->first();
            if ($current == null)
            {
                CurrentOnline::create([
                   'user_id' => Auth::user()->id,
                    'time' => strtotime(Carbon::now()),
                    'ip_address' => Request::ip(),
                ]);
            }else{
                $current->time = strtotime(Carbon::now());
            }
        }



        return $next($request);
    }
}
