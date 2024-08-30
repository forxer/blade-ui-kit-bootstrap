<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use Illuminate\Support\Str;

class Save extends SimpleButton
{
    public function __construct(
        public ?string $text = null,
        public bool $hideText = false,
        public ?string $title = null,
        public ?string $formId = null,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public bool $outline = false,
        public bool $noOutline = false,
        public ?string $size = null,
        public bool $lg = false,
        public bool $sm = false,
        public bool $disabled = false,
        public string $variant = 'primary',
        public string $type = 'submit',
        public ?string $startContent = null,
        public ?string $endContent = null,
    ) {
        $text ??= Str::ucfirst(trans('action.save'));

        if ($confirm !== null) {
            $confirmId ??= 'save-'.Str::random(32);
        }

        parent::__construct(
            text: $text,
            hideText: $hideText,
            title: $title,
            variant: $variant,
            outline: $outline,
            noOutline: $noOutline,
            size: $size,
            lg: $lg,
            sm: $sm,
            disabled: $disabled,
            confirm: $confirm,
            confirmId: $confirmId,
            formId: $formId,
            type: $type,
            startContent: $startContent,
            endContent: $endContent,
        );
    }
}
