<?php

namespace BladeUIKitBootstrap\Http\Middleware;

use BladeUIKitBootstrap\Enums\BootstrapVersion;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BladeUiKitBootstrap4
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request):Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        app('config')->set(['blade-ui-kit-bootstrap.boostrap_version' => BootstrapVersion::V4]);

        return $next($request);
    }
}
