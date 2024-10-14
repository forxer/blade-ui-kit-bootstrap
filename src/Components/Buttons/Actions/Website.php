<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Website extends LinkButton
{
    protected function initAttributes(): void
    {
        $this->variant ??= 'info';

        $this->text ??= Str::ucfirst(trans('action.see_website'));

        if ($this->url !== null) {
            $this->url = e($this->url);

            $this->title ??= Str::ucfirst(trans('action.see_website_addresss', [
                'addresss' => parse_url($this->url, PHP_URL_HOST),
            ]));
        }

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'info';
            $this->confirmId = 'see-website-'.($this->confirmId ?? Str::random(32));
        }
    }

    public function viewName(): string
    {
        return 'components.buttons.actions.website';
    }
}
