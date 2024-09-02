<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component as IlluminateComponent;

abstract class BladeComponent extends IlluminateComponent
{
    abstract public function viewName(): string;

    public function render(): View
    {
        return view($this->viewPath($this->viewName()));
    }

    protected function viewPath(string $view): string
    {
        static $bootstrapVersion = null;

        if ($bootstrapVersion === null) {
            $bootstrapVersion = 'blade-ui-kit-bootstrap::'.$this->config('boostrap_version')->value.'.';
        }

        return $bootstrapVersion.$view;
    }

    protected function config(string $key): mixed
    {
        static $config = null;

        if ($config === null) {
            $config = app('config')->get('blade-ui-kit-bootstrap');
        }

        if ($key === null) {
            return $config;
        }

        return $config[$key];
    }

    protected function initAttributes(): void
    {
        //
    }

    protected function onConstructing(): void
    {
        //
    }
}
