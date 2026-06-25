<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use BladeUIKitBootstrap\Components\Forms\Inputs\Text;
use BladeUIKitBootstrap\Reflection\AttributeReflector;

it('lists settable bare public properties incl. inherited, excluding promoted and asymmetric-visibility', function () {
    $names = array_column(AttributeReflector::settableProperties(SimpleButton::class), 'name');

    expect($names)->toContain('variant')
        ->toContain('size')
        ->toContain('type')
        ->not->toContain('text')   // promoted constructor param → not here
        ->not->toContain('show');  // promoted constructor param → not here
});

it('kebab-cases settable property names', function () {
    $byName = collect(AttributeReflector::settableProperties(SimpleButton::class))->keyBy('name');

    expect($byName['startIcon']['kebab'])->toBe('start-icon');
});

it('excludes private(set) properties (Input::$id, Input::$value)', function () {
    $names = array_column(AttributeReflector::settableProperties(Text::class), 'name');

    expect($names)->not->toContain('id')->not->toContain('value');
});

it('lists every effective constructor parameter with required flag (incl. inherited)', function () {
    $byName = collect(AttributeReflector::constructorParameters(Text::class))->keyBy('name');

    expect($byName)->toHaveKey('name')
        ->and($byName['name']['required'])->toBeTrue()
        ->and($byName['value']['required'])->toBeFalse();

    $btn = collect(AttributeReflector::constructorParameters(SimpleButton::class))->keyBy('name');
    expect($btn)->toHaveKey('text')->toHaveKey('title')
        ->and($btn['show']['required'])->toBeFalse();
});

it('excludes Illuminate\View\Component internal properties', function () {
    $names = array_column(AttributeReflector::settableProperties(SimpleButton::class), 'name');

    expect($names)->not->toContain('componentName')
        ->not->toContain('attributes')
        ->not->toContain('except');
});

it('returns an empty array for a class without a constructor', function () {
    $anon = new class {};

    expect(AttributeReflector::constructorParameters($anon::class))->toBe([]);
});
