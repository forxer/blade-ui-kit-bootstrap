<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Preview extends LinkButton
{
    public function __construct(
        public string $action,
        public ?string $text = null,
        public bool $hideText = false,
        public ?string $title = null,
        public string $variant = 'info',
        public bool $outline = false,
        public bool $noOutline = false,
        public ?string $size = null,
        public bool $lg = false,
        public bool $sm = false,
        public bool $disabled = false,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public ?string $startContent = null,
        public ?string $endContent = null,
    ) {
        $text ??= Str::ucfirst(trans('action.preview'));

        if ($confirm !== null) {
            $confirmId ??= 'show-'.Str::random(32);
        }

        parent::__construct(
            url: $action,
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
            startContent: $startContent,
            endContent: $endContent,
        );
    }
}
