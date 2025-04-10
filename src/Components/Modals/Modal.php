<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\ModalVariant;

class Modal extends BladeComponent
{
    use ModalVariant;

    public string $titleLabel;

    public $header;

    public $footer;

    public function __construct(
        public string $id,
        public string $title,
        public bool $dismissable = true,
        public ?string $variant = null,
        public bool $outline = false,
        public bool $noOutline = false,
    ) {
        $this->onConstructing();
        $this->initAttributes();

        $this->titleLabel = str($id)->kebab()->append('-label')->toString();

        $this->validModalVariant();
    }

    public function viewName(): ?string
    {
        return 'components.modals.modal';
    }
}
