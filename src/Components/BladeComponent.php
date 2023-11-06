<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components;

use Illuminate\View\Component as IlluminateComponent;

abstract class BladeComponent extends IlluminateComponent
{
    abstract public function viewName(): string;

    public function viewPath(string $view): string
    {
        static $bootstrapVersion = null;

        if ($bootstrapVersion === null) {
            $bootstrapVersion = 'blade-ui-kit-bootstrap::'.\config('blade-ui-kit-bootstrap.boostrap_version').'.';
        }

        return $bootstrapVersion.$view;
    }

    public function render()
    {
        return \view($this->viewPath($this->viewName()));
    }
}
