<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\ViewErrorBag;

trait CanHaveErrors
{
    public string $errorField;

    public string $errorBag = 'default';

    public bool $hasErrors;

    private ViewErrorBag $errors;

    public function messages(): array
    {
        $bag = $this->errors->getBag($this->errorBag);

        return $bag->has($this->errorField) ? $bag->get($this->errorField) : [];
    }

    protected function bootCanHaveErrors(string $errorField, ?string $errorBag = null): void
    {
        static $view = null;

        if ($view === null) {
            $view = resolve(ViewFactory::class);
        }

        $this->errors = $view->shared('errors', new ViewErrorBag());

        $this->errorField($errorField);
        $this->errorBag($errorBag);

        $this->hasErrors = $this->hasErrors();
    }

    protected function errorField(string $errorField): void
    {
        $this->errorField = $errorField;
    }

    protected function errorBag(?string $errorBag = null): void
    {
        if (\is_null($errorBag)) {
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
