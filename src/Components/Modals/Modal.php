<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;

class Modal extends BladeComponent
{
    public string $titleLabel;

    public $header;

    public $footer;

    public function __construct(
        public string $id,
        public string $title,
        public bool $dismissable = true,
    ) {
        $this->titleLabel = str($id)->kebab()->append('-label')->toString();
    }

    public function viewName(): string
    {
        return 'components.modals.modal';
    }
}
