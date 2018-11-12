<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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

        if (Auth::check()){


            if (Auth::user()->admin){


                return $next($request);


            }

            session()->flash('message', 'You Do Not Have Permission To View This.');
            Session::flash('type', 'error');
            Session::flash('title', 'Permission Not Granted');


            return redirect()->route('userDashboard');


        }


        return abort(404);


    }
}
