<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions\Back;

use Illuminate\Support\Str;

class BackList extends Back
{
    public function __construct(
        public string $action,
        public ?string $text = null,
        public ?string $title = null,
        public string $variant = 'secondary',
        public bool $outline = false,
        public bool $noOutline = false,
        public ?string $size = null,
        public bool $lg = false,
        public bool $sm = false,
        public bool $disabled = false,
        public ?string $confirm = null,
        public ?string $confirmId = null,
    ) {
        $text ??= Str::ucfirst(trans('back.list'));

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
            confirmId: $confirmId,
        );
    }
}
