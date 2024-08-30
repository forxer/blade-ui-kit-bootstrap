<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\FormButton;
use Illuminate\Support\Str;

class Delete extends FormButton
{
    public function __construct(
        public string $action,
        public ?string $text = null,
        public ?string $title = null,
        public string $variant = 'danger',
        public bool $outline = false,
        public bool $noOutline = false,
        public ?string $size = null,
        public bool $lg = false,
        public bool $sm = false,
        public bool $disabled = false,
        public ?string $confirm = null,
        public ?string $formId = null,
        public string $method = 'PATCH',
        public string $type = 'submit',
        public bool $novalidate = true,
        public ?string $startContent = null,
        public ?string $endContent = null,
    ) {
        $text ??= Str::ucfirst(trans('action.delete'));
        $formId ??= 'delete-'.Str::random(32);

        parent::__construct(
            action: $action,
            text: $text,
            title: $title,
            variant: $variant,
            outline: $outline,
            noOutline: $noOutline,
            size: $size,
            lg: $lg,
            sm: $sm,
            disabled: $disabled,
            confirm: $confirm,
            formId: $formId,
            method: $method,
            type: $type,
            novalidate: $novalidate,
            startContent: $startContent,
            endContent: $endContent,
        );
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.delete';
    }
}
