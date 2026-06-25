<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components;

use BladeUIKitBootstrap\Reflection\AttributeReflector;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component as IlluminateComponent;
use ReflectionException;
use ReflectionProperty;

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
     * Hook for application-level extensions, executed after property hydration.
     *
     * This method is called during `withAttributes()`, after all public properties
     * have been hydrated from the attribute bag, but BEFORE the package's own
     * `initAttributes()` runs. This ordering means your defaults (set with `??=`)
     * take precedence over the package's defaults.
     *
     * **No `parent::onAttributesSet()` call is needed.**
     *
     * Example — customizing an extended component:
     * ```php
     * protected function onAttributesSet(): void
     * {
     *     $this->variant ??= 'danger';
     *     $this->text ??= 'My custom label';
     * }
     * ```
     */
    protected function onAttributesSet(): void {}

    /**
     * Initialize component attributes with default values and validation.
     *
     * This method is called during `withAttributes()`, after `onAttributesSet()`,
     * and is intended for use by the package's own components (action buttons,
     * base button classes). It handles setting package-level defaults and running
     * validation logic (variant, size, icons, etc.).
     *
     * Action buttons override this method and call `parent::initAttributes()`
     * so the parent base class can validate after defaults are set.
     *
     * **Application developers should use `onAttributesSet()` instead.**
     */
    protected function initAttributes(): void {}

    /**
     * Cache for extra property reflection data, keyed by class name.
     *
     * Each entry is an array of ['name' => string, 'kebab' => string, 'type' => ?string]
     * representing public properties not in the constructor.
     *
     * @var array<class-string, list<array{name: string, kebab: string, type: ?string}>>
     */
    private static array $extraPropertiesCache = [];

    public function withAttributes(array $attributes)
    {
        parent::withAttributes($attributes);

        if ($this->resolveExtraProperties() === []) {
            return $this;
        }

        $this->hydrateExtraProperties();
        $this->onAttributesSet();
        $this->initAttributes();
        $this->refreshComponentData();

        return $this;
    }

    /**
     * Hydrate public class properties declared outside the constructor from the attribute bag.
     *
     * Scans for public properties not in the constructor and not on
     * Illuminate\View\Component, matches them against attributes by camelCase or
     * kebab-case name, applies type coercion based on the property's declared type,
     * and removes hydrated attributes from the bag.
     */
    private function hydrateExtraProperties(): void
    {
        $extraProperties = $this->resolveExtraProperties();

        if ($extraProperties === []) {
            return;
        }

        $keysToRemove = [];

        foreach ($extraProperties as $prop) {
            $key = match (true) {
                $this->attributes->has($prop['name']) => $prop['name'],
                $this->attributes->has($prop['kebab']) => $prop['kebab'],
                default => null,
            };

            if ($key === null) {
                continue;
            }

            $value = $this->attributes->get($key);

            if ($value !== null && $prop['type'] !== null) {
                $value = match ($prop['type']) {
                    'int' => (int) $value,
                    'float' => (float) $value,
                    'bool' => filter_var($value, FILTER_VALIDATE_BOOLEAN),
                    'string' => (string) $value,
                    default => $value,
                };
            }

            $this->{$prop['name']} = $value;
            $keysToRemove[] = $key;
        }

        if ($keysToRemove !== []) {
            $this->attributes = $this->attributes->except($keysToRemove);
        }
    }

    /**
     * Refresh the component data stored in the view factory's component stack.
     *
     * Blade's compiled template calls `data()` (which snapshots public properties by value)
     * BEFORE `withAttributes()`. This means any property modifications made during
     * `hydrateExtraProperties()` or `onAttributesSet()` are invisible to the view.
     *
     * This method updates the stale snapshot in the view factory's internal component data
     * stack with fresh property values, so `renderComponent()` uses up-to-date data.
     */
    private function refreshComponentData(): void
    {
        $viewFactory = app('view');

        try {
            $stackReflection = new ReflectionProperty($viewFactory, 'componentStack');
            $stackSize = \count($stackReflection->getValue($viewFactory));

            if ($stackSize === 0) {
                return;
            }

            $dataReflection = new ReflectionProperty($viewFactory, 'componentData');
            $componentData = $dataReflection->getValue($viewFactory);

            $index = $stackSize - 1;
            $componentData[$index] = array_merge(
                $componentData[$index],
                $this->extractPublicProperties()
            );

            $dataReflection->setValue($viewFactory, $componentData);
        } catch (ReflectionException) {
            // Silently degrade if framework internals change
        }
    }

    /**
     * Resolve and cache the list of extra public properties for this component class.
     *
     * @return list<array{name: string, kebab: string, type: ?string}>
     */
    private function resolveExtraProperties(): array
    {
        return self::$extraPropertiesCache[static::class]
            ??= AttributeReflector::settableProperties(static::class);
    }

    public static function flushCache(): void
    {
        parent::flushCache();

        self::$extraPropertiesCache = [];
    }

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
