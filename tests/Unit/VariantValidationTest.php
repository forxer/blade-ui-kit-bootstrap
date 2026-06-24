<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Components\Alerts\Alert;
use BladeUIKitBootstrap\Components\Buttons\SimpleButton;

it('rejects an invalid button variant', function () {
    $button = new SimpleButton();
    $button->variant = 'not-a-color';

    $method = new ReflectionMethod($button, 'validBtnVariant');
    $method->invoke($button);
})->throws(InvalidArgumentException::class);

it('accepts a valid button variant', function () {
    $button = new SimpleButton();
    $button->variant = 'success';

    $method = new ReflectionMethod($button, 'validBtnVariant');
    $method->invoke($button);

    expect($button->variant)->toBe('success');
});

it('rejects an invalid alert variant', function () {
    $alert = new Alert();
    $alert->variant = 'not-a-color';

    $method = new ReflectionMethod($alert, 'validAlertVariant');
    $method->invoke($alert);
})->throws(InvalidArgumentException::class);
