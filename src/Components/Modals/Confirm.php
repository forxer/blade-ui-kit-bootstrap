<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;

class Confirm extends BladeComponent
{
    public private(set) string $titleLabel;

    public ?string $title = null;

    public ?string $confirmVariant = null;

    public function __construct(
        public string $id,
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
