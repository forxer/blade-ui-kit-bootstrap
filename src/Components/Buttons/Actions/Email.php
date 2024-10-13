<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Email extends LinkButton
{
    public string $address;

    protected function initAttributes(): void
    {
        $this->variant ??= 'info';

        $this->confirmVariant ??= 'info';

        $this->text ??= Str::ucfirst(trans('action.send_email'));

        $this->hideText ??= true;

        $this->title ??= Str::ucfirst(trans('action.send_email_to_address', [
            'address' => e($this->address),
        ]));

        $this->url ??= 'mailto:'.e($this->address);

        if ($this->confirm !== null) {
            $this->confirmId = 'show-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.email';
    }
}
