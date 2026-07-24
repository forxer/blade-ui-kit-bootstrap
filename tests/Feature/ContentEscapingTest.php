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

/*
 * Value properties escaped by the component itself (`{{ }}` in the view or `e()`
 * in `initAttributes()`) must also be constructor parameters: a bound value that
 * went through the attribute bag arrives pre-escaped and gets escaped a second
 * time, so the browser-decoded result still contains entities (`t&amp;JY` ends
 * up in the clipboard instead of `t&JY`).
 */
it('escapes a bound copy string exactly once in the copy-text attribute', function () {
    $html = Blade::render('<x-btn-copy :string="$password" />', [
        'password' => 't&JY',
    ]);

    expect($html)
        ->toContain('data-buk-copy-text="t&amp;JY"')
        ->not->toContain('&amp;amp;');
});

it('escapes a bound copy target exactly once in the copy-target attribute', function () {
    $html = Blade::render('<x-btn-copy :target="$selector" />', [
        'selector' => '#foo &amp; bar',
    ]);

    expect($html)
        ->toContain('data-buk-copy-target="#foo &amp;amp; bar"')
        ->not->toContain('&amp;amp;amp;');
});

it('escapes the copy string exactly once in the generated tooltip title', function () {
    $html = Blade::render('<x-btn-copy :string="$password" hide-text />', [
        'password' => 't&JY',
    ]);

    expect($html)->not->toContain('&amp;amp;');
});

it('escapes a bound email address exactly once', function () {
    $html = Blade::render('<x-btn-email :address="$address" />', [
        'address' => "o'brien@example.com",
    ]);

    expect($html)
        ->toContain('mailto:o&#039;brien@example.com')
        ->not->toContain('&amp;#039;');
});

it('escapes a bound phone number exactly once', function () {
    $html = Blade::render('<x-btn-phone :phone-number="$phone" :phone-number-displayed="$displayed" />', [
        'phone' => '+33 1 & 2',
        'displayed' => '01 & 02',
    ]);

    expect($html)
        ->toContain('tel:+33 1 &amp; 2')
        ->not->toContain('&amp;amp;');
});
