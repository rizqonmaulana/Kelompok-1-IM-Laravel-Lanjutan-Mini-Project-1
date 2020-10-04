<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class MahasiswaMiddleware
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
        // return $next($request);

        if(Auth::user()->isUser()){
            return $next($request);    
        }
    }
}
