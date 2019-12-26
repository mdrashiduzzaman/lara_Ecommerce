<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $Role)
    {
        if(Auth::check()==false || Auth::user()->$Role != true){
            return redirect('/');
        }
        return $next($request);
    }
}
