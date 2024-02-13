<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Destroy extends FormButton
{
    public function __construct(
        public string $action,
        public ?string $text = null,
        public ?string $formId = null,
        public ?string $title = null,
        public ?string $confirm = null,
        public bool $disabled = false,
        public bool $novalidate = true,
        string $method = 'DELETE',
        string $variant = 'danger',
    ) {
        $text ??= ucfirst(trans('actions.delete'));
        $formId ??= 'destroy-'.Str::random(32);

        parent::__construct($action, $text, $formId, $title, $confirm, $disabled, $novalidate, $method, $variant);
    }
}
