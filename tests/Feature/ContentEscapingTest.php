<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

/**
 * Content properties rendered raw (`{!! !!}`) must be declared as constructor
 * parameters so Blade does NOT apply `sanitizeComponentAttribute()` (`e()`) to them.
 * Otherwise a caller-escaped value is escaped a second time (double encoding).
 *
 * Regression guard for the Alert `title`, which lost this guarantee when the
 * component's constructor was removed (fixed by moving `title` back to the constructor).
 */
it('does not double-escape a pre-escaped alert title', function () {
    $html = Blade::render('<x-alert :title="$title">body</x-alert>', [
        'title' => e('Tom & Jerry'),   // caller-escaped: "Tom &amp; Jerry"
    ]);

    expect($html)
        ->toContain('Tom &amp; Jerry')
        ->not->toContain('Tom &amp;amp; Jerry');
});

it('renders an alert title raw (caller-escapes contract)', function () {
    $html = Blade::render('<x-alert :title="$title">body</x-alert>', [
        'title' => '<em>hi</em>',
    ]);

    // The package does not escape the title; the caller owns escaping.
    expect($html)->toContain('<em>hi</em>');
});

it('does not double-escape a pre-escaped button title', function () {
    $html = Blade::render('<x-btn-edit url="/x" :title="$title" />', [
        'title' => e('Tom & Jerry'),
    ]);

    expect($html)
        ->toContain('title="Tom &amp; Jerry"')
        ->not->toContain('Tom &amp;amp; Jerry');
});
