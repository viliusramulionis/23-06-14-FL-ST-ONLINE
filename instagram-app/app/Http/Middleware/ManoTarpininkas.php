<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class ManoTarpininkas 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle(Request $request, Closure $next) {
        if(auth()->user()) {
            return response('Vartotojas neprisijungęs', 401);
        } else {
            return $next($request);
        }
        
    }
}
