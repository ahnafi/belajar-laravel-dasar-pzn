<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContohMiddleware
{
    function handle(Request $request, Closure $next): Response
    {
        $key = $request->header('X-API-KEY');
        if ($key == "TEST") {
            return $next($request);
        } else {
            return response("Access Denied", 401);
        }
    }
}
