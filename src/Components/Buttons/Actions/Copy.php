<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons\Actions;

use BladeUIKitBootstrap\Components\Buttons\SimpleButton;
use Illuminate\Support\Str;
use InvalidArgumentException;

class Copy extends SimpleButton
{
    /**
     * `target` and `string` are declared as constructor parameters — not bare public
     * properties — so Blade does NOT apply `sanitizeComponentAttribute()` (`e()`) to
     * bound values. The view's `{{ }}` output is then the single escaping point;
     * otherwise a bound value would be escaped twice and the browser-decoded
     * attribute would still contain entities, which would end up in the clipboard.
     *
     * @param  string|null  $target  CSS selector of the element whose content will be copied to the clipboard.
     * @param  string|null  $string  Literal string to copy to the clipboard (alternative to `target`).
     * @param  bool  $show  Display the button. Defaults to `true`.
     * @param  bool  $hide  Force-hide the button (takes precedence over `show`).
     * @param  string|null  $text  Button label (raw HTML allowed).
     * @param  string|null  $title  Button `title` attribute (raw HTML allowed).
     * @param  string|null  $confirm  Confirmation message; enables a confirmation modal.
     * @param  string|null  $confirmTitle  Title of the confirmation modal.
     * @param  string|null  $formId  Target form identifier (`form` attribute).
     * @param  string|null  $startContent  Raw HTML content inserted before the text.
     * @param  string|null  $endContent  Raw HTML content inserted after the text.
     */
    public function __construct(
        public ?string $target = null,
        public ?string $string = null,
        bool $show = true,
        bool $hide = false,
        ?string $text = null,
        ?string $title = null,
        ?string $confirm = null,
        ?string $confirmTitle = null,
        ?string $formId = null,
        ?string $startContent = null,
        ?string $endContent = null,
    ) {
        parent::__construct($show, $hide, $text, $title, $confirm, $confirmTitle, $formId, $startContent, $endContent);
    }

    protected function initAttributes(): void
    {
        if ($this->target !== null && $this->string !== null) {
            throw new InvalidArgumentException(
                'The copy button accepts either a "target" or a "string" attribute, not both.'
            );
        }

        if ($this->target === null && $this->string === null) {
            throw new InvalidArgumentException(
                'The copy button requires either a "target" or a "string" attribute.'
            );
        }

        $this->variant ??= 'secondary';

        $this->text ??= Str::ucfirst(trans('action.copy'));

        if ($this->hideText) {
            if ($this->target !== null) {
                $this->title ??= $this->text;
            } elseif ($this->string !== null) {
                $this->title ??= Str::ucfirst(trans('action.copy_something', [
                    'something' => e($this->string),
                ]));
            }
        }

        if ($this->confirm !== null) {
            $this->confirmVariant ??= 'secondary';
            $this->confirmId = 'copy-'.($this->confirmId ?? Str::random(32));
        }

        parent::initAttributes();
    }

    public function viewName(): ?string
    {
        if (! $this->show || $this->hide) {
            return null;
        }

        return 'components.buttons.actions.copy';
    }
}
