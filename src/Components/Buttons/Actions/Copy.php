<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use Illuminate\Support\Str;

class Copy extends SimpleButton
{
    public function __construct(
        public ?string $target = null,
        public ?string $string = null,
        public ?string $text = null,
        public bool $hideText = false,
        public ?string $title = null,
        public ?string $variant = null,
        public bool $outline = false,
        public bool $noOutline = false,
        public ?string $size = null,
        public bool $lg = false,
        public bool $sm = false,
        public bool $disabled = false,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public ?string $confirmTitle = null,
        public ?string $confirmVariant = null,
        public ?string $formId = null,
        public ?string $type = null,
        public ?string $startContent = null,
        public ?string $endContent = null,
        public ?string $icon = null,
        public ?string $startIcon = null,
        public ?string $endIcon = null,
    ) {
        parent::__construct(
            $text,
            $hideText,
            $title,
            $variant,
            $outline,
            $noOutline,
            $size,
            $lg,
            $sm,
            $disabled,
            $confirm,
            $confirmId,
            $confirmTitle,
            $confirmVariant,
            $startContent,
            $endContent,
            $icon,
            $startIcon,
            $endIcon,
        );
    }

    protected function initAttributes(): void
    {
        $this->variant ??= 'secondary';

        $this->text ??= Str::ucfirst(trans('action.copy'));

        if ($this->hideText) {
            if ($this->target !== null) {
                $this->title ??= $this->text;
            } elseif ($this->string !== null) {
                $this->title ??= Str::ucfirst(trans('action.copy_something', [
                    'something' => e($this->string),
                ]));
            }
        }

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'secondary';
            $this->confirmId = 'copy-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.copy';
    }
}
