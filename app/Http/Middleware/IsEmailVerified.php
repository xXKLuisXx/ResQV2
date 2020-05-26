<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsEmailVerified
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
        //dd(Auth::user()->email_verified_at);
        
        if(Auth::user()->email_verified_at != null){
            return $next($request);
        }else{
            return redirect('verify');
        }        
    }
}
