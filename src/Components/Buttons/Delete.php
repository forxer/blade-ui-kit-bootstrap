<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Buttons;

use BladeUIKitBootstrap\Concerns\FormMethod;

class Delete extends FormButton
{
    public function __construct(
        public string $url,
        public string $method = 'delete',
        public ?string $formId = null,
    ) {
        parent::__construct(
            formId: $formId,
            action: $url,
            method: $method,
            hasFiles: false,
            novalidate: true,
        );
    }

    public function viewName(): string
    {
        return 'components.buttons.delete';
    }
}
