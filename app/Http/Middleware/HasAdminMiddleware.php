<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user()->is_admin === true) {
            return $next($request);
        }
        abort(Response::HTTP_FORBIDDEN);
//        return $next($request);
    }
}
