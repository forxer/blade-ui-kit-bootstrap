<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Ide\DocblockParser;

$variantDoc = <<<'DOC'
/**
 * Bootstrap color variant of the button. Defaults to `primary`.
 *
 * @var 'primary'|'secondary'|'danger'|null The `outline-*` values are only valid in Bootstrap 5.
 */
DOC;

it('extracts the summary line', function () use ($variantDoc): void {
    expect(DocblockParser::summary($variantDoc))
        ->toBe('Bootstrap color variant of the button. Defaults to `primary`.');
});

it('extracts @var single-quoted literals, excluding null', function () use ($variantDoc): void {
    expect(DocblockParser::varLiterals($variantDoc))
        ->toBe(['primary', 'secondary', 'danger']);
});

it('returns empty values when there is no @var literal union', function (): void {
    $doc = "/**\n * Render the button as disabled.\n */";
    expect(DocblockParser::varLiterals($doc))->toBe([]);
    expect(DocblockParser::summary($doc))->toBe('Render the button as disabled.');
});

it('returns null summary for an empty/false docblock', function (): void {
    expect(DocblockParser::summary(false))->toBeNull();
    expect(DocblockParser::summary(''))->toBeNull();
});

it('extracts a @param summary by name', function (): void {
    $doc = <<<'DOC'
    /**
     * @param  string|null  $text  Button label (raw HTML allowed).
     * @param  bool  $show  Display the button. Defaults to `true`.
     */
    DOC;

    expect(DocblockParser::paramSummary($doc, 'text'))->toBe('Button label (raw HTML allowed).');
    expect(DocblockParser::paramSummary($doc, 'show'))->toBe('Display the button. Defaults to `true`.');
    expect(DocblockParser::paramSummary($doc, 'missing'))->toBeNull();
});
