<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;

class Confirm extends BladeComponent
{
    public string $titleLabel;

    public function __construct(
        public string $id,
        public ?string $title = null,
    ) {
        $this->onConstructing();
        $this->initAttributes();

        $this->titleLabel = str($id)->kebab()->append('-label')->toString();

        $this->title ??= trans('blade-ui-kit-bootstrap::modal.confirm');
    }

    public function viewName(): string
    {
        return 'components.modals.confirm';
    }
}
