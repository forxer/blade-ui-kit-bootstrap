<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Ide\AttributeMetadata;
use BladeUIKitBootstrap\Ide\ComponentMetadata;
use BladeUIKitBootstrap\Ide\Emitters\SnippetsEmitter;

function btnMeta(bool $hasSlot = false): ComponentMetadata
{
    return new ComponentMetadata(
        tag: 'x-btn',
        description: 'Bootstrap button.',
        attributes: [
            new AttributeMetadata('variant', 'Color variant.', ['primary', 'secondary'], false, false),
            new AttributeMetadata('disabled', 'Disabled.', [], true, false),
        ],
        hasSlot: $hasSlot,
    );
}

it('builds a blade-scoped snippet keyed by display name', function (): void {
    $out = SnippetsEmitter::emit([btnMeta()]);

    expect($out)->toHaveKey('x-btn')
        ->and($out['x-btn']['scope'])->toBe('blade')
        ->and($out['x-btn']['prefix'])->toBe('x-btn')
        ->and($out['x-btn']['description'])->toBe('Bootstrap button.');
});

it('scaffolds constrained attributes as choices with a leading empty option', function (): void {
    $body = SnippetsEmitter::emit([btnMeta()])['x-btn']['body'][0];

    expect($body)->toContain('variant="${1|,primary,secondary|}"')
        ->not->toContain('disabled');
});

it('self-closes when there is no slot', function (): void {
    $body = SnippetsEmitter::emit([btnMeta(false)])['x-btn']['body'][0];
    expect($body)->toEndWith('/>$0')->and($body)->toStartWith('<x-btn ');
});

it('pairs tags when there is a slot', function (): void {
    $body = SnippetsEmitter::emit([btnMeta(true)])['x-btn']['body'][0];
    expect($body)->toContain('>$0</x-btn>');
});

it('places required attributes before constrained ones as plain placeholders', function (): void {
    $meta = new ComponentMetadata('x-text', 'Text input.', [
        new AttributeMetadata('name', 'Field name.', [], false, true),
        new AttributeMetadata('variant', 'Variant.', ['a', 'b'], false, false),
    ], false);

    $body = SnippetsEmitter::emit([$meta])['x-text']['body'][0];

    expect($body)->toContain('name="${1:name}"')
        ->and($body)->toContain('variant="${2|,a,b|}"');
});
