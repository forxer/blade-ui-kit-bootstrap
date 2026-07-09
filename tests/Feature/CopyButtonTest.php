<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

/**
 * The copy button relies on the native Clipboard API (`navigator.clipboard`)
 * and package-scoped `data-buk-copy-*` attributes. It must not reference the
 * legacy clipboard.js hooks (`.btn-clipboard` class, `data-clipboard-*`
 * attributes) that collided with application-level ClipboardJS initializers.
 */
it('renders a literal string as a data-buk-copy-text attribute', function () {
    $html = Blade::render('<x-btn-copy string="string to copy" />');

    expect($html)
        ->toContain('data-buk-copy-text="string to copy"')
        ->not->toContain('btn-clipboard')
        ->not->toContain('data-clipboard');
});

it('renders a CSS selector as a data-buk-copy-target attribute', function () {
    $html = Blade::render('<x-btn-copy target="#element" />');

    expect($html)
        ->toContain('data-buk-copy-target="#element"')
        ->not->toContain('data-buk-copy-text')
        ->not->toContain('btn-clipboard')
        ->not->toContain('data-clipboard');
});

it('pushes a script using the native Clipboard API instead of ClipboardJS', function () {
    $script = Blade::render(
        '<x-btn-copy string="foo" />'."\n@stack('blade-ui-kit-bs-scripts')"
    );

    expect($script)
        ->toContain('navigator.clipboard')
        ->not->toContain('ClipboardJS');
});
