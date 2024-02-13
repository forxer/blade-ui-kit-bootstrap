<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Logout extends FormButton
{
    public function __construct(
        public string $action = '',
        public ?string $text = null,
        public ?string $formId = null,
        public ?string $title = null,
        public ?string $confirm = null,
        public bool $disabled = false,
        public bool $novalidate = true,
        string $method = 'POST',
        string $variant = 'secondary',
    ) {
        $action = $action === '' ? \route('logout') : $action;
        $text ??= trans('Logout');
        $formId ??= 'logout-'.Str::random(32);

        parent::__construct($action, $text, $formId, $title, $confirm, $disabled, $novalidate, $method, $variant);
    }
}
