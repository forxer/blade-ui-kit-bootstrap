<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BtnIcons;
use BladeUIKitBootstrap\Concerns\BtnSize;
use BladeUIKitBootstrap\Concerns\BtnVariant;
use Illuminate\Support\Str;

class HelpInfo extends BladeComponent
{
    use BtnIcons;
    use BtnSize;
    use BtnVariant;

    public function __construct(
        public string $content,
        public ?string $text = null,
        public bool $hideText = false,
        public ?string $title = null,
        public ?string $variant = 'link',
        public bool $outline = false,
        public bool $noOutline = false,
        public ?string $size = null,
        public bool $lg = false,
        public bool $sm = false,
        public ?string $icon = null,
        public ?string $startIcon = null,
    ) {
        $this->onConstructing();

        $this->text ??= Str::ucfirst(trans('status.info'));

        $this->validBtnVariant();
        $this->validBtnSize();
        $this->validBtnStartIcon();
    }

    public function viewName(): string
    {
        return 'components.buttons.help-info';
    }
}
