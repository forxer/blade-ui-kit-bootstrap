<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Reflection;

use Illuminate\Support\Str;
use Illuminate\View\Component as IlluminateComponent;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionProperty;

final class AttributeReflector
{
    /**
     * Public, settable, non-promoted properties — the runtime hydration surface.
     *
     * Includes inherited properties (traits/parent). Excludes static, promoted,
     * Illuminate\View\Component internals, and asymmetric-visibility setters
     * (`private(set)` / `protected(set)`), which cannot be set from outside.
     *
     * Note: promoted parameters are excluded via `isPromoted()`; for this package's
     * components this is equivalent to excluding by constructor-parameter name, since
     * such params are either promoted or carry `private(set)`/`protected(set)`.
     *
     * @return list<array{name: string, kebab: string, type: ?string}>
     */
    public static function settableProperties(string $class): array
    {
        $reflection = new ReflectionClass($class);
        $properties = [];

        foreach ($reflection->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            if ($property->isStatic()) {
                continue;
            }

            if ($property->isPromoted()) {
                continue;
            }

            if ($property->isPrivateSet()) {
                continue;
            }

            if ($property->isProtectedSet()) {
                continue;
            }

            if ($property->getDeclaringClass()->getName() === IlluminateComponent::class) {
                continue;
            }

            $name = $property->getName();
            $type = $property->getType();

            $properties[] = [
                'name' => $name,
                'kebab' => Str::kebab($name),
                'type' => $type instanceof ReflectionNamedType ? $type->getName() : null,
            ];
        }

        return $properties;
    }

    /**
     * Every parameter of the effective (possibly inherited) constructor.
     *
     * Blade binds all constructor parameters by name, so they are all settable
     * attributes regardless of promotion.
     *
     * @return list<array{name: string, kebab: string, type: ?string, required: bool}>
     */
    public static function constructorParameters(string $class): array
    {
        $constructor = new ReflectionClass($class)->getConstructor();

        if ($constructor === null) {
            return [];
        }

        $parameters = [];

        foreach ($constructor->getParameters() as $parameter) {
            $type = $parameter->getType();

            $parameters[] = [
                'name' => $parameter->getName(),
                'kebab' => Str::kebab($parameter->getName()),
                'type' => $type instanceof ReflectionNamedType ? $type->getName() : null,
                'required' => ! $parameter->isDefaultValueAvailable(),
            ];
        }

        return $parameters;
    }
}
