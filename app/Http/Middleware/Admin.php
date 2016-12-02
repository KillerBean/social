<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'Admin')
    {
        if( Auth::Check() && Auth::user()->role == "Admin" ){
            return $next($request);
        }else{
            return abort(404);
        }
    }

}
