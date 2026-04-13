<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use Illuminate\Support\Str;

class Copy extends SimpleButton
{
    public ?string $target = null;

    public ?string $string = null;

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

        parent::initAttributes();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.copy';
    }
}
