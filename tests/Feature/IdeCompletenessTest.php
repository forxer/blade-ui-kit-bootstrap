<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Components\BladeComponent;
use Illuminate\View\Component as IlluminateComponent;
use Symfony\Component\Finder\Finder;

/**
 * @return list<class-string>
 */
function componentClasses(): array
{
    $classes = [];
    $finder = (new Finder())->files()->in(__DIR__.'/../../src/Components')->name('*.php');

    foreach ($finder as $file) {
        $relative = str_replace(['/', '.php'], ['\\', ''], $file->getRelativePathname());
        $class = 'BladeUIKitBootstrap\\Components\\'.$relative;

        if (! class_exists($class)) {
            continue;
        }

        $reflection = new ReflectionClass($class);

        if ($reflection->isAbstract() || ! $reflection->isSubclassOf(BladeComponent::class)) {
            continue;
        }

        $classes[$class] = $class;
    }

    return array_values($classes);
}

it('documents every public property and constructor parameter', function () {
    $undocumented = [];

    foreach (componentClasses() as $class) {
        $reflection = new ReflectionClass($class);

        // Public, settable, non-promoted properties must have a docblock.
        // Mirror the hydration filter: private(set)/protected(set) properties are not
        // attribute-settable, so they are not part of the IDE attribute surface.
        foreach ($reflection->getProperties(ReflectionProperty::IS_PUBLIC) as $property) {
            if ($property->isStatic() || $property->isPromoted()) {
                continue;
            }

            if ($property->isPrivateSet() || $property->isProtectedSet()) {
                continue;
            }

            if ($property->getDeclaringClass()->getName() === IlluminateComponent::class) {
                continue;
            }

            if (! is_string($property->getDocComment()) || trim((string) $property->getDocComment()) === '') {
                $undocumented[] = "{$property->getDeclaringClass()->getName()}::\${$property->getName()}";
            }
        }

        // Public promoted constructor params must have an @param tag in the constructor docblock.
        $constructor = $reflection->getConstructor();

        if ($constructor === null || $constructor->getDeclaringClass()->getName() !== $class) {
            continue;
        }

        $doc = (string) $constructor->getDocComment();

        foreach ($constructor->getParameters() as $parameter) {
            if (! $parameter->isPromoted()) {
                continue;
            }

            if (! str_contains($doc, '$'.$parameter->getName())) {
                $undocumented[] = "{$class}::__construct(\${$parameter->getName()})";
            }
        }
    }

    expect($undocumented)->toBe([], 'Undocumented members: '.implode(', ', $undocumented));
});
