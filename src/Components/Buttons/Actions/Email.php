<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Email extends LinkButton
{
    public function __construct(
        public ?string $address = null,
        public ?string $url = null,
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
        public ?string $startContent = null,
        public ?string $endContent = null,
        public ?string $icon = null,
        public ?string $startIcon = null,
        public ?string $endIcon = null,
    ) {
        parent::__construct(
            $url,
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
        $this->variant ??= 'info';

        $this->text ??= Str::ucfirst(trans('action.send_email'));

        if ($this->address !== null) {
            $this->address = e($this->address);

            $this->title ??= Str::ucfirst(trans('action.send_email_to_address', [
                'address' => $this->address,
            ]));

            $this->url ??= 'mailto:'.$this->address;
        }

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'info';
            $this->confirmId = 'email-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.email';
    }
}
