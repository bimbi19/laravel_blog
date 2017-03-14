<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        //middelware untuk cek status pengguna   
        if ((!Auth::guest()) && (Auth::user()->level_pengguna == 'admin')) {
            return $next($request);
         }
        return redirect('/');
    }

}
