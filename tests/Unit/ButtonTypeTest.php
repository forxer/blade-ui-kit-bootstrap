<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use BladeUIKitBootstrap\Components\Buttons\SimpleButton;

it('defaults the simple button type to button', function () {
    $button = new SimpleButton();

    $method = new ReflectionMethod($button, 'validBtnType');
    $method->invoke($button);

    expect($button->type)->toBe('button');
});

it('defaults the form button type to submit', function () {
    $button = new FormButton(url: '/x');

    $method = new ReflectionMethod($button, 'validBtnType');
    $method->invoke($button);

    expect($button->type)->toBe('submit');
});
