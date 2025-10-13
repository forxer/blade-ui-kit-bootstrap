<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

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
        public ?string $content = null,
        public ?string $text = null,
        public bool $hideText = false,
        public bool $show = true,
        public bool $hide = false,
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
        $this->initAttributes();

        if (! $this->show || $this->hide) {
            return;
        }

        $this->text ??= Str::ucfirst(trans('status.info'));

        $this->validBtnVariant();
        $this->validBtnSize();
        $this->validBtnStartIcon();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.help-info';
    }
}
