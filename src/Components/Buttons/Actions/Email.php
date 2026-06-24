<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Email extends LinkButton
{
    /** Target email address (used for the `mailto:` link). */
    public ?string $address = null;

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

        parent::initAttributes();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.email';
    }
}
