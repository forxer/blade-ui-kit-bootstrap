<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Tests\Fixtures\Bootstrap4;

/**
 * The Bootstrap version prefix is cached for the whole process, so switching the
 * configuration between two tests has no effect: these test-only subclasses
 * render the Bootstrap 4 views directly.
 */
trait RendersBootstrap4Views
{
    protected function viewPath(string $view): string
    {
        return 'blade-ui-kit-bootstrap::bootstrap-4.'.$view;
    }
}
