<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;

class Modal extends BladeComponent
{
    public string $id;
    public string $title;
    public bool $dismissable;

    public string $titleLabel;

    public $header;
    public $footer;

    public function __construct(string $id, string $title, bool $dismissable = true)
    {
        $this->id = $id;
        $this->title = $title;
        $this->titleLabel = str($id)->kebab()->append('-label')->toString();
        $this->dismissable = $dismissable;
    }

    public function viewName(): string
    {
        return 'components.modals.modal';
    }
}
