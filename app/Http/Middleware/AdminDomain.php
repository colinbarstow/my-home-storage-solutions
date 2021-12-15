<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->getHost() != adminUrl())
            return redirect()->route('login');
        return $next($request);
    }
}
