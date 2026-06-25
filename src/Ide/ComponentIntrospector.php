<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Ide;

use BladeUIKitBootstrap\Reflection\AttributeReflector;
use ReflectionClass;
use ReflectionProperty;

final readonly class ComponentIntrospector
{
    public function __construct(
        private string $prefix,
        private string $bootstrapVersion,
    ) {}

    /**
     * @param  array<string, class-string>  $components  alias => component class
     * @return list<ComponentMetadata>
     */
    public function introspect(array $components): array
    {
        $metadata = [];

        foreach ($components as $alias => $class) {
            $metadata[] = new ComponentMetadata(
                tag: $this->tag($alias),
                description: DocblockParser::summary(new ReflectionClass($class)->getDocComment()),
                attributes: $this->attributes($class),
                hasSlot: SlotDetector::hasSlot($class, $this->bootstrapVersion),
            );
        }

        return $metadata;
    }

    private function tag(string $alias): string
    {
        return $this->prefix === '' ? 'x-'.$alias : 'x-'.$this->prefix.'-'.$alias;
    }

    /**
     * Union of settable properties (A) and constructor parameters (B), deduped by
     * kebab name, sorted alphabetically.
     *
     * @return list<AttributeMetadata>
     */
    private function attributes(string $class): array
    {
        $attributes = [];

        foreach (AttributeReflector::settableProperties($class) as $property) {
            $doc = new ReflectionProperty($class, $property['name'])->getDocComment();
            $values = DocblockParser::varLiterals($doc);

            $attributes[$property['kebab']] = new AttributeMetadata(
                name: $property['kebab'],
                description: DocblockParser::summary($doc),
                values: $values,
                boolean: $property['type'] === 'bool' && $values === [],
                required: false,
            );
        }

        $constructorDoc = new ReflectionClass($class)->getConstructor()?->getDocComment() ?? false;

        foreach (AttributeReflector::constructorParameters($class) as $parameter) {
            if (isset($attributes[$parameter['kebab']])) {
                continue;
            }

            $attributes[$parameter['kebab']] = new AttributeMetadata(
                name: $parameter['kebab'],
                description: DocblockParser::paramSummary($constructorDoc, $parameter['name']),
                values: [],
                boolean: $parameter['type'] === 'bool',
                required: $parameter['required'],
            );
        }

        ksort($attributes);

        return array_values($attributes);
    }
}
