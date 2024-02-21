<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Restore extends FormButton
{
    public function __construct(
        public string $action,
        public ?string $text = null,
        public ?string $formId = null,
        public ?string $title = null,
        public ?string $confirm = null,
        public bool $outline = false,
        public bool $noOutline = false,
        public bool $disabled = false,
        public bool $novalidate = true,
        string $method = 'PATCH',
        string $variant = 'warning',
    ) {
        $text ??= ucfirst(trans('actions.restore'));
        $formId ??= 'restore-'.Str::random(32);

        parent::__construct($action, $text, $formId, $title, $confirm, $outline, $noOutline, $disabled, $novalidate, $method, $variant);
    }
}
