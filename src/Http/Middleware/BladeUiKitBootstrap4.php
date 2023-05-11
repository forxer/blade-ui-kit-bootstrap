<?php

namespace BladeUIKitBootstrap\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BladeUiKitBootstrap4
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        app('config')->set(['blade-ui-kit-bootstrap.boostrap_version' => 'bootstrap-4']);

        return $next($request);
    }
}
