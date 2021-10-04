<?php

namespace App\Http\Middleware;

use Closure;

class StoryContributor
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
        if (auth()->user()->usertypes_id == 7) {   
            return $next($request);

        }

        return response()->json('Login Authentication failed');
    }
}
