<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;

class Confirm extends BladeComponent
{
    public private(set) string $titleLabel;

    /**
     * Color variant of the confirmation button.
     *
     * @var 'primary'|'secondary'|'success'|'danger'|'warning'|'info'|'light'|'dark'|'link'|'outline-primary'|'outline-secondary'|'outline-success'|'outline-danger'|'outline-warning'|'outline-info'|'outline-light'|'outline-dark'|null
     */
    public ?string $confirmVariant = null;

    /**
     * `title` is a constructor parameter (not a bare public property) so Blade does not apply
     * `sanitizeComponentAttribute()` (`e()`) to it. The value is escaped once downstream by the
     * `<x-modal>` view (`{{ $title }}`), which avoids double escaping.
     *
     * @param  string  $id  Unique identifier of the confirmation modal.
     * @param  string|null  $title  Confirmation message. Defaults to the `modal.confirm` translation.
     */
    public function __construct(
        public string $id,
        public ?string $title = null,
    ) {
        $this->titleLabel = str($id)->kebab()->append('-label')->toString();
    }

    protected function initAttributes(): void
    {
        $this->title ??= trans('blade-ui-kit-bootstrap::modal.confirm');
    }

    public function viewName(): ?string
    {
        return 'components.modals.confirm';
    }
}
