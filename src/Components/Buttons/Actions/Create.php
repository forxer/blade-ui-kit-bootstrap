<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Create extends LinkButton
{
    public function __construct(
        public string $action,
        public ?string $text = null,
        public ?string $title = null,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public bool $disabled = false,
        string $variant = 'primary',
    ) {
        $text ??= ucfirst(trans('actions.add'));

        if ($confirm !== null) {
            $confirmId ??= 'create-'.Str::random(32);
        }

        parent::__construct($action, $text, $title, $confirm, $confirmId, $disabled, $variant);
    }
}
