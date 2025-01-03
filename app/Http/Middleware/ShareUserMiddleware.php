<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ShareUserMiddleware
{
    public function handle($request, Closure $next)
    {
        // Share the authenticated user with all views
        view()->share('user', Auth::user());

        return $next($request);
    }
}
