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

    /**
     * Snippets are the zero-install fallback, so they stay deliberately lean: required
     * attributes as plain tab stops, plus the primary `variant` as a value dropdown.
     *
     * Other constrained attributes (size, type, confirm-variant, …) are intentionally not
     * scaffolded: a snippet choice always keeps its first value when tabbed past, which would
     * force unwanted defaults (e.g. `size="lg"`). Full, non-forcing value completion for every
     * attribute is the dedicated VS Code extension's job.
     */
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
            if (! $attribute->required && $attribute->name === 'variant' && $attribute->values !== []) {
                $tabstop++;
                $parts[] = $attribute->name.'="${'.$tabstop.'|'.implode(',', $attribute->values).'|}"';
            }
        }

        $attributesString = $parts === [] ? '' : ' '.implode(' ', $parts);

        return $component->hasSlot
            ? '<'.$component->tag.$attributesString.'>$0</'.$component->tag.'>'
            : '<'.$component->tag.$attributesString.' />$0';
    }
}
