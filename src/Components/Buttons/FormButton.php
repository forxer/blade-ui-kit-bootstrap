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

    public bool $hideText = false;

    public ?string $variant = null;

    public bool $outline = false;

    public bool $noOutline = false;

    public ?string $size = null;

    public bool $lg = false;

    public bool $sm = false;

    public bool $disabled = false;

    public ?string $formId = null;

    public ?string $confirmId = null;

    public ?string $confirmVariant = null;

    public ?string $method = null;

    public ?string $type = 'submit';

    public bool $novalidate = true;

    public ?string $icon = null;

    public ?string $startIcon = null;

    public ?string $endIcon = null;

    /**
     * Content properties are declared as constructor parameters — not bare public properties — so
     * Blade does NOT apply `sanitizeComponentAttribute()` (`e()`) to them. They are rendered raw
     * (`{!! !!}`) to allow HTML, so the "caller escapes" contract is preserved and pre-escaped or
     * HTML content is not double escaped.
     */
    public function __construct(
        public string $url,
        public bool $show = true,
        public bool $hide = false,
        public ?string $text = null,
        public ?string $title = null,
        public ?string $confirm = null,
        public ?string $confirmTitle = null,
        public ?string $startContent = null,
        public ?string $endContent = null,
    ) {}

    protected function initAttributes(): void
    {
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
