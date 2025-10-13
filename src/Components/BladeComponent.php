<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component as IlluminateComponent;

abstract class BladeComponent extends IlluminateComponent
{
    abstract public function viewName(): ?string;

    public function render(): View|string
    {
        if (($viewName = $this->viewName()) === null) {
            return '';
        }

        return view($this->viewPath($viewName));
    }

    /**
     * Initialize component attributes with default values.
     *
     * This method is called early in the component constructor, after `onConstructing()`,
     * allowing child components to set default values for their properties before
     * any validation or processing logic executes.
     *
     * **IMPORTANT:** This method is intended for use by the package's default components
     * (such as action buttons). If you are extending a component in your application,
     * you should use `onConstructing()` instead.
     *
     * Example usage in a package component:
     * ```php
     * protected function initAttributes(): void
     * {
     *     $this->variant ??= 'primary';
     *     $this->text ??= Str::ucfirst(trans('action.save'));
     *     $this->confirmVariant ??= 'primary';
     * }
     * ```
     */
    protected function initAttributes(): void {}

    /**
     * Hook executed at the very beginning of the component constructor.
     *
     * This method is called before `initAttributes()` and before any other
     * constructor logic, providing an early hook for component extensions to perform
     * setup operations or pre-initialization tasks.
     *
     * **IMPORTANT:** This method is intended for developers extending components
     * in their applications. Use this hook to customize component behavior when
     * creating custom components via `make:blade-ui-kit-bs-component` or manually.
     *
     * Use this method when you need to execute logic before default attributes
     * are initialized, such as modifying constructor parameters or setting up
     * component state that other initialization methods depend on.
     *
     * Example usage when extending a component in your application:
     * ```php
     * protected function onConstructing(): void
     * {
     *     // Customize behavior before package's initAttributes() runs
     *     $this->variant ??= 'danger';
     *     $this->icon = 'trash';
     * }
     * ```
     */
    protected function onConstructing(): void {}

    /**
     * Cached configuration array for the package.
     * Uses property hook to lazily load and cache configuration.
     */
    private array $configCache {
        get {
            static $cache = null;

            return $cache ??= app('config')->get('blade-ui-kit-bootstrap');
        }
    }

    /**
     * Cached Bootstrap version prefix for view paths.
     * Uses property hook to compute and cache the prefix.
     */
    private string $bootstrapVersionPrefix {
        get {
            static $prefix = null;

            return $prefix ??= 'blade-ui-kit-bootstrap::'.$this->config('bootstrap_version')->value.'.';
        }
    }

    protected function viewPath(string $view): string
    {
        return $this->bootstrapVersionPrefix.$view;
    }

    protected function config(string $key): mixed
    {
        return $this->configCache[$key];
    }
}
