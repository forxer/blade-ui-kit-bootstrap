<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\FormMethod;

class Form extends BladeComponent
{
    use FormMethod;

    /**
     * @param  string  $action  Target URL of the form (`action` attribute).
     * @param  'GET'|'POST'|'PUT'|'PATCH'|'DELETE'  $method  HTTP method. Defaults to `POST` (method spoofing for PUT/PATCH/DELETE).
     * @param  bool  $hasFiles  The form accepts file uploads (`enctype=multipart/form-data`).
     * @param  bool|null  $novalidate  Add `novalidate`. `null` falls back to the `all_forms_with_novalidate` config.
     */
    public function __construct(
        public string $action,
        public string $method = 'POST',
        public bool $hasFiles = false,
        public ?bool $novalidate = null,
    ) {
        $this->validFormMethod();

        if ($this->novalidate === null) {
            $this->novalidate = $this->config('all_forms_with_novalidate');
        }
    }

    public function viewName(): ?string
    {
        return 'components.forms.form';
    }
}
