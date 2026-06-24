<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;

class Modal extends BladeComponent
{
    public private(set) string $titleLabel;

    /** Custom header slot of the modal. */
    public $header;

    /** Custom footer slot of the modal. */
    public $footer;

    /** Display the close button. Defaults to `true`. */
    public bool $dismissable = true;

    /**
     * Modal size. `null` means the default size.
     *
     * @var 'sm'|'lg'|'xl'|null
     */
    public ?string $size = null;

    /** Vertically center the modal. */
    public bool $centered = false;

    /** Make the modal body scrollable. */
    public bool $scrollable = false;

    /**
     * @param  string  $id  Unique identifier of the modal.
     * @param  string  $title  Title displayed in the header.
     */
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
