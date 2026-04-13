<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Phone extends LinkButton
{
    public ?string $phoneNumber = null;

    public ?string $phoneNumberDisplayed = null;

    protected function initAttributes(): void
    {
        $this->variant ??= 'info';

        $this->text ??= Str::ucfirst(trans('action.call_phone'));

        if ($this->phoneNumber !== null) {
            $this->phoneNumber = e($this->phoneNumber);

            $this->title ??= Str::ucfirst(trans('action.call_phone_number', [
                'phone-number' => $this->phoneNumberDisplayed !== null ? e($this->phoneNumberDisplayed) : $this->phoneNumber,
            ]));

            $this->url ??= 'tel:'.$this->phoneNumber;
        }

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'info';
            $this->confirmId = 'phone-'.($this->confirmId ?? Str::random(32));
        }

        parent::initAttributes();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.phone';
    }
}
