<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\ModalVariant;

class Confirm extends BladeComponent
{
    use ModalVariant;

    public string $titleLabel;

    public function __construct(
        public string $id,
        public ?string $title = null,
        public ?string $variant = null,
        public ?string $confirmVariant = null,
        public bool $outline = false,
        public bool $noOutline = false,
    ) {
        $this->onConstructing();
        $this->initAttributes();

        $this->titleLabel = str($id)->kebab()->append('-label')->toString();

        $this->title ??= trans('blade-ui-kit-bootstrap::modal.confirm');

        $this->validModalVariant();
    }

    public function viewName(): string
    {
        return 'components.modals.confirm';
    }
}
