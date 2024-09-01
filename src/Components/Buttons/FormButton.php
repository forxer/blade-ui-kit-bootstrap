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
        public string $action,
        public ?string $text = null,
        public bool $hideText = false,
        public ?string $title = null,
        public string $variant = 'primary',
        public bool $outline = false,
        public bool $noOutline = false,
        public ?string $size = null,
        public bool $lg = false,
        public bool $sm = false,
        public bool $disabled = false,
        public ?string $confirm = null,
        public ?string $formId = null,
        public string $method = 'POST',
        public string $type = 'submit',
        public bool $novalidate = true,
        public ?string $startContent = null,
        public ?string $endContent = null,
        public ?string $icon = null,
        public ?string $startIcon = null,
        public ?string $endIcon = null,
    ) {
        $this->formId = $formId ?? 'form-button-'.Str::random(32);
        $this->method = $this->validFormMethod($method);
        $this->type = $this->validBtnType($type);
        $this->variant = $this->validBtnVariant($variant, $outline, $noOutline);
        $this->size = $this->validBtnSize($size, $lg, $sm);
        $this->startIcon = $this->validBtnStartIcon($icon, $startIcon);
        $this->endIcon = $this->validBtnEndIcon($endIcon);
    }

    public function viewName(): string
    {
        return 'components.buttons.form-button';
    }
}
