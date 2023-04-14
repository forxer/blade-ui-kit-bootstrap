<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use Illuminate\Support\ViewErrorBag;

trait CanHaveErrors
{
    /** @var string */
    public $errorField;

    /** @var string */
    public $errorBag = 'default';

    /** @var bool */
    public $hasErrors;

    private $errors;

    public function messages(): array
    {
        $bag = $this->errors->getBag($this->errorBag);

        return $bag->has($this->errorField) ? $bag->get($this->errorField) : [];
    }

    protected function bootCanHaveErrors(ViewErrorBag $errors, string $errorField, ?string $errorBag): void
    {
        $this->errorField($errorField);
        $this->errorBag($errorBag);

        $this->errors = $errors;

        $this->hasErrors = $this->hasErrors();
    }

    protected function errorField(string $errorField): void
    {
        $this->errorField = $errorField;
    }

    protected function errorBag(?string $errorBag = null): void
    {
        if (is_null($errorBag)) {
            return;
        }

        $this->errorBag = $errorBag;
    }

    protected function hasErrors(): bool
    {
        $bag = $this->errors->getBag($this->errorBag);

        return $bag->has($this->errorField);
    }
}
