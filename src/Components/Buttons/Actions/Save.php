<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use Illuminate\Support\Str;

class Save extends SimpleButton
{
    public function __construct(
        public ?string $text = null,
        public ?string $title = null,
        public ?string $formId = null,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public bool $outline = false,
        public bool $noOutline = false,
        public bool $disabled = false,
        string $variant = 'primary',
        string $type = 'submit',
    ) {
        $text ??= ucfirst(trans('actions.save'));

        if ($confirm !== null) {
            $confirmId ??= 'create-'.Str::random(32);
        }

        parent::__construct($text, $title, $formId, $confirm, $confirmId, $outline, $noOutline, $disabled, $variant, $type);
    }
}
