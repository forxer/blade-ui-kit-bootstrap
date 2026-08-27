<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

/**
 * The website button title comes from `action.see_website_address`, renamed in
 * forxer/generic-term-translations-for-laravel 2.0. Both the key and its
 * `:address` parameter were previously misspelled with three `s`.
 */
it('renders the website button title from the address translation key', function () {
    app('translator')->addLines([
        'action.see_website' => 'voir le site internet',
        'action.see_website_address' => 'voir le site internet :address',
    ], 'en');

    $html = Blade::render('<x-btn-website url="https://example.com/page" />');

    expect($html)
        ->toContain('title="Voir le site internet example.com"')
        ->not->toContain('addresss');
});

it('renders no title when the website button has no url', function () {
    app('translator')->addLines([
        'action.see_website' => 'voir le site internet',
        'action.see_website_address' => 'voir le site internet :address',
    ], 'en');

    $html = Blade::render('<x-btn-website />');

    expect($html)->not->toContain('title=');
});
