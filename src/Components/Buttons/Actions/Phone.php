<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Phone extends LinkButton
{
    /**
     * `phoneNumber` and `phoneNumberDisplayed` are declared as constructor parameters —
     * not bare public properties — so Blade does NOT apply `sanitizeComponentAttribute()`
     * (`e()`) to bound values. The values are kept raw: the `tel:` URL is escaped once
     * by the view (`{{ $url }}`) and the tooltip escapes them explicitly with `e()`
     * (title is rendered raw).
     *
     * @param  string|null  $phoneNumber  Target phone number (used for the `tel:` link).
     * @param  string|null  $phoneNumberDisplayed  Phone number as displayed on screen (if different from `phoneNumber`).
     * @param  bool  $show  Display the button. Defaults to `true`.
     * @param  bool  $hide  Force-hide the button (takes precedence over `show`).
     * @param  string|null  $url  Target URL of the link (`href` attribute).
     * @param  string|null  $text  Button label (raw HTML allowed).
     * @param  string|null  $title  `title` attribute (raw HTML allowed).
     * @param  string|null  $confirm  Confirmation message; enables a confirmation modal.
     * @param  string|null  $confirmTitle  Title of the confirmation modal.
     * @param  string|null  $startContent  Raw HTML content inserted before the text.
     * @param  string|null  $endContent  Raw HTML content inserted after the text.
     */
    public function __construct(
        public ?string $phoneNumber = null,
        public ?string $phoneNumberDisplayed = null,
        bool $show = true,
        bool $hide = false,
        ?string $url = null,
        ?string $text = null,
        ?string $title = null,
        ?string $confirm = null,
        ?string $confirmTitle = null,
        ?string $startContent = null,
        ?string $endContent = null,
    ) {
        parent::__construct($show, $hide, $url, $text, $title, $confirm, $confirmTitle, $startContent, $endContent);
    }

    protected function initAttributes(): void
    {
        $this->variant ??= 'info';

        $this->text ??= Str::ucfirst(trans('action.call_phone'));

        if ($this->phoneNumber !== null) {
            $this->title ??= Str::ucfirst(trans('action.call_phone_number', [
                'phone-number' => e($this->phoneNumberDisplayed ?? $this->phoneNumber),
            ]));

            $this->url ??= 'tel:'.$this->phoneNumber;
        }

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'info';
            $this->confirmId = 'phone-'.($this->confirmId ?? Str::random(32));
        }

        parent::initAttributes();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.phone';
    }
}
