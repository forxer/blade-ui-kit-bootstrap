<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Archives extends LinkButton
{
    public function __construct(
        public string $action,
        public ?string $text = null,
        public ?string $title = null,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public bool $outline = false,
        public bool $noOutline = false,
        public bool $disabled = false,
        string $variant = 'secondary',
    ) {
        $text ??= ucfirst(trans('misc.archives'));

        if ($confirm !== null) {
            $confirmId ??= 'archives-'.Str::random(32);
        }

        parent::__construct($action, $text, $title, $confirm, $confirmId, $outline, $noOutline, $disabled, $variant);
    }
}
