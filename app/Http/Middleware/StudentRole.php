<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class StudentRole
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

        if (Auth::check()) {
            //user has been admitted redirect them to login with matric number
            if (Auth::User()->admission_status == '2') {
                             
                return redirect()->route('portal', ['sect'=>'home']);            
            }
            //user was not given admission
            if (Auth::User()->admission_status == '1') {
                Auth::logout();
                return redirect()->route('login')->with('errors', 'Sorry uer not found');;
            }
        }else{
             return redirect()->route('login');
        }
       
        return $next($request);
    }
}
