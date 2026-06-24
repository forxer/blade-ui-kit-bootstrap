<?php

declare(strict_types=1);

it('boots the package service provider', function () {
    expect(config('blade-ui-kit-bootstrap'))->toBeArray();
});
