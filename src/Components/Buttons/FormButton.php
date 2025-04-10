<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\BtnIcons;
use BladeUIKitBootstrap\Concerns\BtnSize;
use BladeUIKitBootstrap\Concerns\BtnType;
use BladeUIKitBootstrap\Concerns\BtnVariant;
use BladeUIKitBootstrap\Concerns\FormMethod;
use Illuminate\Support\Str;

class FormButton extends BladeComponent
{
    use BtnIcons;
    use BtnSize;
    use BtnType;
    use BtnVariant;
    use FormMethod;

    public function __construct(
        public string $url,
        public ?string $text = null,
        public bool $hideText = false,
        public bool $show = true,
        public bool $hide = false,
        public ?string $title = null,
        public ?string $variant = null,
        public bool $outline = false,
        public bool $noOutline = false,
        public ?string $size = null,
        public bool $lg = false,
        public bool $sm = false,
        public bool $disabled = false,
        public ?string $formId = null,
        public ?string $confirm = null,
        public ?string $confirmId = null,
        public ?string $confirmTitle = null,
        public ?string $confirmVariant = null,
        public ?string $method = null,
        public ?string $type = 'submit',
        public bool $novalidate = true,
        public ?string $startContent = null,
        public ?string $endContent = null,
        public ?string $icon = null,
        public ?string $startIcon = null,
        public ?string $endIcon = null,
    ) {
        $this->onConstructing();
        $this->initAttributes();

        if (! $this->show || $this->hide) {
            return;
        }

        $this->formId ??= 'form-button-'.Str::random(32);

        if ($this->confirm !== null) {
            $this->confirmId ??= $this->formId;
        }

        $this->validFormMethod();
        $this->validBtnType(self::DEFAULT_FORM_BUTTON_TYPE);
        $this->validBtnVariant();
        $this->validBtnSize();
        $this->validBtnStartIcon();
        $this->validBtnEndIcon();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.form-button';
    }
}
