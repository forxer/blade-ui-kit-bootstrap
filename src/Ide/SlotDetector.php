<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Ide;

use BladeUIKitBootstrap\Components\BladeComponent;
use ReflectionClass;
use ReflectionNamedType;
use Throwable;

final class SlotDetector
{
    /**
     * Whether the component's resolved Blade view echoes `$slot`.
     *
     * Instantiates with dummy constructor arguments (many components require
     * primitives like `$name`) to obtain the real view name, then scans the view
     * file. Any failure degrades to `false` (snippet renders self-closing).
     */
    public static function hasSlot(string $class, string $bootstrapVersion): bool
    {
        try {
            $component = self::instantiate($class);

            if (! $component instanceof BladeComponent) {
                return false;
            }

            $viewName = $component->viewName();

            if ($viewName === null) {
                return false;
            }

            $finder = app('view')->getFinder();
            $path = $finder->find('blade-ui-kit-bootstrap::'.$bootstrapVersion.'.'.$viewName);

            return str_contains((string) file_get_contents($path), '$slot');
        } catch (Throwable) {
            return false;
        }
    }

    private static function instantiate(string $class): object
    {
        $constructor = new ReflectionClass($class)->getConstructor();

        if ($constructor === null) {
            return new $class();
        }

        $args = [];

        foreach ($constructor->getParameters() as $parameter) {
            if ($parameter->isDefaultValueAvailable()) {
                $args[] = $parameter->getDefaultValue();

                continue;
            }

            $type = $parameter->getType();
            $typeName = $type instanceof ReflectionNamedType ? $type->getName() : 'string';

            $args[] = match ($typeName) {
                'int' => 0,
                'float' => 0.0,
                'bool' => false,
                'array' => [],
                default => 'x',
            };
        }

        return new $class(...$args);
    }
}
