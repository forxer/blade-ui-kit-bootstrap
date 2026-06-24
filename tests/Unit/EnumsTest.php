<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Enums\AlertVariant;
use BladeUIKitBootstrap\Enums\BadgeVariant;
use BladeUIKitBootstrap\Enums\BtnSize;
use BladeUIKitBootstrap\Enums\BtnType;
use BladeUIKitBootstrap\Enums\BtnVariant;
use BladeUIKitBootstrap\Enums\HttpMethod;

it('exposes button variant values including outline for v5', function () {
    expect(BtnVariant::values())
        ->toContain('primary', 'link', 'outline-primary', 'outline-dark')
        ->and(BtnVariant::valuesForV4())
        ->toContain('primary', 'link')
        ->not->toContain('outline-primary');
});

it('exposes the other referential values', function () {
    expect(AlertVariant::values())->toContain('primary', 'dark')->not->toContain('link');
    expect(BadgeVariant::values())->toContain('primary', 'dark');
    expect(BtnSize::values())->toEqualCanonicalizing(['lg', 'sm']);
    expect(BtnType::values())->toEqualCanonicalizing(['button', 'reset', 'submit']);
    expect(HttpMethod::values())->toEqualCanonicalizing(['GET', 'POST', 'PUT', 'PATCH', 'DELETE']);
});
