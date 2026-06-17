<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;

class Confirm extends BladeComponent
{
    public private(set) string $titleLabel;

    public ?string $confirmVariant = null;

    /**
     * `title` is a constructor parameter (not a bare public property) so Blade does not apply
     * `sanitizeComponentAttribute()` (`e()`) to it. The value is escaped once downstream by the
     * `<x-modal>` view (`{{ $title }}`), which avoids double escaping.
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
