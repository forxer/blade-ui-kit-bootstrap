<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Components\Alerts\Alert;
use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use BladeUIKitBootstrap\Components\Forms\Inputs\Text;
use BladeUIKitBootstrap\Enums\BtnVariant;
use BladeUIKitBootstrap\Ide\ComponentIntrospector;

function metaFor(array $components, string $prefix = ''): array
{
    $list = new ComponentIntrospector($prefix, 'bootstrap-5')->introspect($components);

    return collect($list)->keyBy('tag')->all();
}

it('computes the tag from the alias and empty prefix', function (): void {
    $meta = metaFor(['btn' => SimpleButton::class]);

    expect($meta)->toHaveKey('x-btn');
});

it('prefixes the tag when a prefix is configured', function (): void {
    $meta = metaFor(['btn' => SimpleButton::class], 'bs');

    expect($meta)->toHaveKey('x-bs-btn');
});

it('emits the variant attribute with the full enum value set', function (): void {
    $btn = metaFor(['btn' => SimpleButton::class])['x-btn'];
    $variant = collect($btn->attributes)->firstWhere('name', 'variant');

    expect($variant->values)->toBe(BtnVariant::values())
        ->and($variant->description)->toContain('Bootstrap color variant');
});

it('emits boolean flag attributes with no values', function (): void {
    $btn = metaFor(['btn' => SimpleButton::class])['x-btn'];
    $disabled = collect($btn->attributes)->firstWhere('name', 'disabled');

    expect($disabled->boolean)->toBeTrue()->and($disabled->values)->toBe([]);
});

it('includes constructor-param attributes and marks required ones', function (): void {
    $text = metaFor(['text' => Text::class])['x-text'];
    $name = collect($text->attributes)->firstWhere('name', 'name');

    expect($name)->not->toBeNull()
        ->and($name->required)->toBeTrue();
});

it('marks slot-bearing components from their resolved view', function (): void {
    $alert = metaFor(['alert' => Alert::class])['x-alert'];

    expect($alert->hasSlot)->toBeTrue();
});
