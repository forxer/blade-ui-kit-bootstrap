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
     * This is particularly useful for action button components that need to set
     * default variant colors, default text labels, or generate default IDs.
     *
     * Example usage in a child component:
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
     * constructor logic, providing an early hook for child components to perform
     * setup operations or pre-initialization tasks.
     *
     * Use this method when you need to execute logic before default attributes
     * are initialized, such as modifying constructor parameters or setting up
     * component state that other initialization methods depend on.
     *
     * Example usage in a child component:
     * ```php
     * protected function onConstructing(): void
     * {
     *     // Perform early setup before attribute initialization
     *     $this->prepareComponentState();
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
