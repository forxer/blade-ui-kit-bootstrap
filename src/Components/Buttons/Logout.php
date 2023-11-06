<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use Illuminate\Support\Str;

class Logout extends FormButton
{
    public function __construct(
        ?string $url = null,
        ?string $formId = null,
        ?string $title = null,
        ?string $confirm = null,
        bool $disabled = false,
        bool $novalidate = true,
    ) {
        parent::__construct(
            action: $url ?? \route('logout'),
            formId: 'logout-'.($formId ?? Str::random(32)),
            method: 'POST',
            title: $title,
            confirm: $confirm,
            disabled: $disabled,
            novalidate: $novalidate,
        );
    }

    public function viewName(): string
    {
        return 'components.buttons.logout';
    }
}
