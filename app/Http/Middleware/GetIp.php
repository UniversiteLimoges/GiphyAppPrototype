<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GetIp
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
        $current_user = Auth::user();

        // Add ip to the user
        $current_user->visitor_ip = $_SERVER['REMOTE_ADDR'];
        $current_user->save();

        return $next($request);
    }
}
