<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component as IlluminateComponent;
use ReflectionClass;
use ReflectionException;
use ReflectionNamedType;
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
     * Hook executed after extra properties have been hydrated from the attribute bag.
     *
     * This method is called during `withAttributes()`, after all public properties
     * declared outside the constructor (in child classes) have been automatically
     * populated from template attributes with proper type coercion.
     *
     * **IMPORTANT:** This method is intended for developers extending components
     * in their applications. Use this hook to add custom typed properties to
     * a component without redeclaring the parent constructor.
     *
     * Example — adding a badge counter to an extended button:
     * ```php
     * class Archives extends Base
     * {
     *     public ?int $itemsInArchives = null;
     *
     *     protected function onAttributesSet(): void
     *     {
     *         if ($this->itemsInArchives !== null) {
     *             $badge = '<span class="badge text-bg-light">'.$this->itemsInArchives.'</span>';
     *             $this->endContent = $this->endContent !== null
     *                 ? $this->endContent.' '.$badge
     *                 : $badge;
     *         }
     *     }
     * }
     * ```
     */
    protected function onAttributesSet(): void {}

    /**
     * Cache for extra property reflection data, keyed by class name.
     *
     * Each entry is an array of ['name' => string, 'kebab' => string, 'type' => ?string]
     * representing public properties not in the constructor and not declared by the package.
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
        $this->refreshComponentData();

        return $this;
    }

    /**
     * Hydrate public class properties declared outside the constructor from the attribute bag.
     *
     * Scans for public properties added by application-level child classes (not declared
     * in the BladeUIKitBootstrap namespace or Illuminate\View\Component), matches them
     * against attributes by camelCase or kebab-case name, applies type coercion based
     * on the property's declared type, and removes hydrated attributes from the bag.
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
        if (isset(self::$extraPropertiesCache[static::class])) {
            return self::$extraPropertiesCache[static::class];
        }

        $constructorParams = static::extractConstructorParameters();
        $reflection = new ReflectionClass($this);
        $properties = [];

        foreach ($reflection->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            if ($property->isStatic()) {
                continue;
            }

            $name = $property->getName();

            if (\in_array($name, $constructorParams, true)) {
                continue;
            }

            $declaringClass = $property->getDeclaringClass()->getName();

            if ($declaringClass === IlluminateComponent::class) {
                continue;
            }

            if (str_starts_with($declaringClass, 'BladeUIKitBootstrap\\')) {
                continue;
            }

            $type = $property->getType();
            $typeName = $type instanceof ReflectionNamedType ? $type->getName() : null;

            $properties[] = [
                'name' => $name,
                'kebab' => Str::kebab($name),
                'type' => $typeName,
            ];
        }

        return self::$extraPropertiesCache[static::class] = $properties;
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
