<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

/*
 * Laravel Boost renders the guideline as a Blade view: a literal `{{ }}` in its
 * text must be written `@{{ }}`, otherwise Blade compiles it as an empty echo
 * and the rendering fails (`e()` called without argument).
 */
it('renders the Boost guideline through Blade', function (): void {
    $guideline = file_get_contents(__DIR__.'/../../resources/boost/guidelines/core.blade.php');

    expect(Blade::render($guideline, [], true))->toContain('escape it with `{{ }}`.');
});
