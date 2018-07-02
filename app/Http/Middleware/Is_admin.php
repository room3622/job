<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Is_admin
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

        /*
         * the user need to be login
         * is admin retur true or false
         * in this case if it returns false the user can't go to admin page
         * it well be redirected to home page
         *
         */
        if(Auth::check() && Auth::user()->is_admin == 1 or Auth::user()->is_admin == 2){


            return $next($request);

        }elseif(Auth::check() && Auth::user()->is_admin == 0){

            return redirect('home');
        }






    }
}
