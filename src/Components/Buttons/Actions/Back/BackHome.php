<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions\Back;

use Illuminate\Support\Str;

class BackHome extends Back
{
    public function __construct(
        public string $action,
        public ?string $text = null,
        public ?string $title = null,
        public string $variant = 'primary',
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
        public ?string $icon = null,
        public ?string $startIcon = null,
        public ?string $endIcon = null,
    ) {
        $text ??= Str::ucfirst(trans('back.home'));

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
            startContent: $startContent,
            endContent: $endContent,
            icon: $icon,
            startIcon: $startIcon,
            endIcon: $endIcon,
        );
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.back.back-home';
    }
}
