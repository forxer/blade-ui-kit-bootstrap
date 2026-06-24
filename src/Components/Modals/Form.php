<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Modals;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\ModalSize;

class Form extends BladeComponent
{
    use ModalSize;

    public private(set) string $titleLabel;

    /** Custom header slot of the modal. */
    public $header;

    /** Custom footer slot of the modal. */
    public $footer;

    /** Display the close button. Defaults to `true`. */
    public bool $dismissable = true;

    /**
     * HTTP method of the form. Defaults to `POST` (with method spoofing for PUT/PATCH/DELETE).
     *
     * @var 'GET'|'POST'|'PUT'|'PATCH'|'DELETE'
     */
    public string $method = 'POST';

    /** The form accepts file uploads (`enctype=multipart/form-data`). */
    public bool $hasFiles = false;

    /** Add the `novalidate` attribute. `null` falls back to the `all_forms_with_novalidate` config. */
    public ?bool $novalidate = null;

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
     * @param  string  $action  Target URL of the form (`action` attribute).
     */
    public function __construct(
        public string $id,
        public string $title,
        public string $action,
    ) {
        $this->titleLabel = str($id)->kebab()->append('-label')->toString();
    }

    protected function initAttributes(): void
    {
        $this->validModalSize();
    }

    public function viewName(): ?string
    {
        return 'components.modals.form';
    }
}
