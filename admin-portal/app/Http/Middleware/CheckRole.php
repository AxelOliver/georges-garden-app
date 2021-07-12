<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $is_admin)
    {
        //dd($is_admin);
        if($is_admin == 1 && auth()->user()->is_admin != 1){
            abort(403);
        }
        if($is_admin == 0 && auth()->user()->is_admin != 0){
            abort(403);
        }
        return $next($request);
    }
}
