<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Tests\Fixtures\Bootstrap4;
use Dom\Element;
use Dom\HTMLDocument;
use Illuminate\Support\Facades\Blade;

/*
 * Some content properties are written into an HTML attribute that the browser
 * decodes before handing it to a script: the confirm message (read from
 * `data-buk-confirm`, then injected into the modal) and the help-info popover
 * (`data-bs-content` / `data-bs-title` with `data-bs-html="true"`). The
 * component must encode what it writes there, otherwise the browser decoding
 * undoes the caller's escaping and `e($name)` comes back as live HTML.
 *
 * Attributes are read with Dom\HTMLDocument, which decodes them like a browser.
 */

beforeEach(function (): void {
    Blade::component('bs4-btn', Bootstrap4\SimpleButton::class);
    Blade::component('bs4-link-button', Bootstrap4\LinkButton::class);
    Blade::component('bs4-form-button', Bootstrap4\FormButton::class);
    Blade::component('bs4-btn-copy', Bootstrap4\Copy::class);
    Blade::component('bs4-help-info', Bootstrap4\HelpInfo::class);
    Blade::component('bs4-confirm-modal', Bootstrap4\Confirm::class);
});

dataset('bootstrap versions', [
    'bootstrap 5' => [''],
    'bootstrap 4' => ['bs4-'],
]);

dataset('buttons with a confirmation', [
    'simple button' => ['btn'],
    'link button' => ['link-button url="/x"'],
    'form button' => ['form-button url="/x"'],
    'copy button' => ['btn-copy string="x"'],
]);

/**
 * First element matching the selector, as a browser would parse the markup.
 */
function firstElementOf(string $html, string $selector): Element
{
    $document = HTMLDocument::createFromString(
        '<!doctype html><html><body>'.$html.'</body></html>',
        LIBXML_NOERROR,
    );

    $element = $document->querySelector($selector);

    expect($element)->not->toBeNull("No element matches {$selector}");

    return $element;
}

const HOSTILE_NAME = '<img src=x onerror=alert(1)>';

it('delivers the confirm message to the script exactly as the caller wrote it', function (string $prefix, string $button): void {
    // A conforming caller: HTML on purpose, untrusted data escaped once.
    $message = 'Supprimer <strong>« '.e(HOSTILE_NAME).' »</strong>&nbsp;?';

    $html = Blade::render("<x-{$prefix}{$button} :confirm=\"\$message\" />", ['message' => $message]);

    $element = firstElementOf($html, '[data-buk-confirm]');

    expect($element->getAttribute('data-buk-confirm'))->toBe($message)
        ->and($element->hasAttribute('data-buk-confirm-html'))->toBeTrue();
})->with('bootstrap versions')->with('buttons with a confirmation');

it('keeps a raw quote of a confirm message inside its attribute', function (string $prefix, string $button): void {
    $html = Blade::render("<x-{$prefix}{$button} :confirm=\"\$message\" />", ['message' => 'Tom" onclick="alert(1)']);

    $element = firstElementOf($html, '[data-buk-confirm]');

    expect($element->hasAttribute('onclick'))->toBeFalse()
        ->and($element->getAttribute('data-buk-confirm'))->toBe('Tom" onclick="alert(1)');
})->with('bootstrap versions')->with('buttons with a confirmation');

it('shows a button title as the text the caller escaped', function (string $prefix, string $button): void {
    $html = Blade::render("<x-{$prefix}{$button} :title=\"\$title\" />", ['title' => e("Tom & <b>O'Brien</b>").'&nbsp;!']);

    expect(firstElementOf($html, '[title]')->getAttribute('title'))->toBe("Tom & <b>O'Brien</b>\u{00A0}!");
})->with('bootstrap versions')->with('buttons with a confirmation');

it('keeps an unescaped button title inside its attribute', function (string $prefix, string $button): void {
    $html = Blade::render("<x-{$prefix}{$button} :title=\"\$title\" />", ['title' => 'Tom" onmouseover="alert(1)']);

    $element = firstElementOf($html, '[title]');

    expect($element->hasAttribute('onmouseover'))->toBeFalse()
        ->and($element->getAttribute('title'))->toBe('Tom" onmouseover="alert(1)');
})->with('bootstrap versions')->with('buttons with a confirmation');

dataset('help-info attributes', [
    'bootstrap 5' => ['', 'data-bs-title', 'data-bs-content'],
    'bootstrap 4' => ['bs4-', 'title', 'data-content'],
]);

it('delivers the help-info content and title to the popover exactly as the caller wrote them', function (string $prefix, string $titleAttribute, string $contentAttribute): void {
    $content = e('<b>'.HOSTILE_NAME.'</b>').' <em>ok</em>&nbsp;!';
    $title = 'Aide <em>'.e(HOSTILE_NAME).'</em>';

    $html = Blade::render("<x-{$prefix}help-info :title=\"\$title\" :content=\"\$content\" />", compact('title', 'content'));

    $element = firstElementOf($html, '[data-'.($prefix === '' ? 'bs-' : '').'toggle="popover"]');

    expect($element->getAttribute($contentAttribute))->toBe($content)
        ->and($element->getAttribute($titleAttribute))->toBe($title);
})->with('help-info attributes');

it('delivers the help-info slot to the popover exactly as it was rendered', function (string $prefix, string $titleAttribute, string $contentAttribute): void {
    $html = Blade::render("<x-{$prefix}help-info>{{ \$name }} <em>ok</em></x-{$prefix}help-info>", ['name' => HOSTILE_NAME]);

    $element = firstElementOf($html, '[data-'.($prefix === '' ? 'bs-' : '').'toggle="popover"]');

    expect(trim($element->getAttribute($contentAttribute)))->toBe(e(HOSTILE_NAME).' <em>ok</em>');
})->with('help-info attributes');

it('injects a confirm message as text unless it is flagged as HTML', function (string $prefix): void {
    $script = Blade::render("<x-{$prefix}confirm-modal id=\"m\" />\n@stack('blade-ui-kit-bs-scripts')");

    expect($script)
        ->toContain("'bukConfirmHtml' in element.dataset")
        ->toContain('message.textContent = element.dataset.bukConfirm');
})->with('bootstrap versions');
