<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Ide\Emitters;

use BladeUIKitBootstrap\Ide\AttributeMetadata;
use BladeUIKitBootstrap\Ide\ComponentMetadata;

final class HtmlDataEmitter
{
    /**
     * @param  list<ComponentMetadata>  $components
     * @return array{version: float, tags: list<array<string, mixed>>}
     */
    public static function emit(array $components): array
    {
        return [
            'version' => 1.1,
            'tags' => array_map(self::tag(...), $components),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private static function tag(ComponentMetadata $component): array
    {
        return [
            'name' => $component->tag,
            'description' => $component->description ?? '',
            'attributes' => array_map(self::attribute(...), $component->attributes),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private static function attribute(AttributeMetadata $attribute): array
    {
        $description = $attribute->description ?? '';

        if ($attribute->required) {
            $description = trim($description.' (required)');
        }

        $data = [
            'name' => $attribute->name,
            'description' => $description,
        ];

        if ($attribute->values !== []) {
            $data['values'] = array_map(
                static fn (string $value): array => ['name' => $value],
                $attribute->values,
            );
        }

        return $data;
    }
}
