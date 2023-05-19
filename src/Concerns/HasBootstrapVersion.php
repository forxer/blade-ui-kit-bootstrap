<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

trait HasBootstrapVersion
{
    public static function viewPath(string $view = null): string
    {
        static $bootstrapVersion = null;

        if ($bootstrapVersion === null) {
            $bootstrapVersion = 'blade-ui-kit-bootstrap::'.config('blade-ui-kit-bootstrap.boostrap_version').'.';
        }

        return $bootstrapVersion.($view ?? '');
    }
}
