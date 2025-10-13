<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;

class Form extends BladeComponent
{
    public string $titleLabel;

    public $header;

    public $footer;

    public function __construct(
        public string $id,
        public string $title,
        public string $action,
        public bool $dismissable = true,
        public string $method = 'POST',
        public bool $hasFiles = false,
        public ?bool $novalidate = null,
        public ?string $size = null,
        public bool $centered = false,
        public bool $scrollable = false,
    ) {
        $this->onConstructing();
        $this->initAttributes();

        $this->titleLabel = str($id)->kebab()->append('-label')->toString();
    }

    public function viewName(): ?string
    {
        return 'components.modals.form';
    }
}
