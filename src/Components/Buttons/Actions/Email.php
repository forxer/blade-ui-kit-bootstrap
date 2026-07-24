<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\LinkButton;
use Illuminate\Support\Str;

class Email extends LinkButton
{
    /**
     * `address` is declared as a constructor parameter — not a bare public property — so
     * Blade does NOT apply `sanitizeComponentAttribute()` (`e()`) to bound values. The
     * value is kept raw: the `mailto:` URL is escaped once by the view (`{{ $url }}`)
     * and the tooltip escapes it explicitly with `e()` (title is rendered raw).
     *
     * @param  string|null  $address  Target email address (used for the `mailto:` link).
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
        public ?string $address = null,
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

        $this->text ??= Str::ucfirst(trans('action.send_email'));

        if ($this->address !== null) {
            $this->title ??= Str::ucfirst(trans('action.send_email_to_address', [
                'address' => e($this->address),
            ]));

            $this->url ??= 'mailto:'.$this->address;
        }

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'info';
            $this->confirmId = 'email-'.($this->confirmId ?? Str::random(32));
        }

        parent::initAttributes();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.email';
    }
}
