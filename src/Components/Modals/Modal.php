<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;

class Modal extends BladeComponent
{
    public private(set) string $titleLabel;

    public $header;

    public $footer;

    public bool $dismissable = true;

    public ?string $size = null;

    public bool $centered = false;

    public bool $scrollable = false;

    public function __construct(
        public string $id,
        public string $title,
    ) {
        $this->titleLabel = str($id)->kebab()->append('-label')->toString();
    }

    public function viewName(): ?string
    {
        return 'components.modals.modal';
    }
}
