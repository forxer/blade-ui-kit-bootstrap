<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Ide\AttributeMetadata;
use BladeUIKitBootstrap\Ide\ComponentMetadata;
use BladeUIKitBootstrap\Ide\Emitters\HtmlDataEmitter;

it('emits the customData envelope', function (): void {
    $out = HtmlDataEmitter::emit([]);
    expect($out['version'])->toBe(1.1)->and($out['tags'])->toBe([]);
});

it('maps a component to a tag with attributes and values', function (): void {
    $meta = new ComponentMetadata('x-btn', 'Bootstrap button.', [
        new AttributeMetadata('variant', 'Color variant.', ['primary', 'secondary'], false, false),
        new AttributeMetadata('disabled', 'Disabled.', [], true, false),
        new AttributeMetadata('name', 'Field name.', [], false, true),
    ], false);

    $tag = HtmlDataEmitter::emit([$meta])['tags'][0];

    expect($tag['name'])->toBe('x-btn')
        ->and($tag['description'])->toBe('Bootstrap button.');

    $variant = collect($tag['attributes'])->firstWhere('name', 'variant');
    expect($variant['values'])->toBe([['name' => 'primary'], ['name' => 'secondary']]);

    $disabled = collect($tag['attributes'])->firstWhere('name', 'disabled');
    expect($disabled)->not->toHaveKey('values');

    $name = collect($tag['attributes'])->firstWhere('name', 'name');
    expect($name['description'])->toBe('Field name. (required)');
});
