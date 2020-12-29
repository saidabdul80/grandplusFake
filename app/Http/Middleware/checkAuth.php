<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class checkAuth
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
        if (!Auth::check()) {
             return redirect()->route('login');            
        }
        return $next($request);
    }
}