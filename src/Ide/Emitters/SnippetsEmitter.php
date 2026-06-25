<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Ide\Emitters;

use BladeUIKitBootstrap\Ide\ComponentMetadata;

final class SnippetsEmitter
{
    /**
     * @param  list<ComponentMetadata>  $components
     * @return array<string, array{scope: string, prefix: string, description: string, body: list<string>}>
     */
    public static function emit(array $components): array
    {
        $snippets = [];

        foreach ($components as $component) {
            $snippets[$component->tag] = [
                'scope' => 'blade',
                'prefix' => $component->tag,
                'description' => $component->description ?? $component->tag,
                'body' => [self::body($component)],
            ];
        }

        return $snippets;
    }

    private static function body(ComponentMetadata $component): string
    {
        $tabstop = 0;
        $parts = [];

        foreach ($component->attributes as $attribute) {
            if ($attribute->required) {
                $tabstop++;
                $parts[] = $attribute->name.'="${'.$tabstop.':'.$attribute->name.'}"';
            }
        }

        foreach ($component->attributes as $attribute) {
            if (! $attribute->required && $attribute->values !== []) {
                $tabstop++;
                $choices = implode(',', array_merge([''], $attribute->values));
                $parts[] = $attribute->name.'="${'.$tabstop.'|'.$choices.'|}"';
            }
        }

        $attributesString = $parts === [] ? '' : ' '.implode(' ', $parts);

        return $component->hasSlot
            ? '<'.$component->tag.$attributesString.'>$0</'.$component->tag.'>'
            : '<'.$component->tag.$attributesString.' />$0';
    }
}
