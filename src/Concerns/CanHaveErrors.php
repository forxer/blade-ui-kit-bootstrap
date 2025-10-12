<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Concerns;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\ViewErrorBag;

trait CanHaveErrors
{
    public private(set) string $errorField;

    public private(set) string $errorBag = 'default';

    public private(set) bool $hasErrors;

    private ViewErrorBag $errors;

    /**
     * ViewFactory instance for accessing shared error bags.
     * Uses property hook with static cache for singleton-like behavior.
     */
    private ViewFactory $viewFactory {
        get {
            static $instance = null;

            return $instance ??= resolve(ViewFactory::class);
        }
    }

    public function messages(): array
    {
        $bag = $this->errors->getBag($this->errorBag);

        return $bag->has($this->errorField) ? $bag->get($this->errorField) : [];
    }

    protected function bootCanHaveErrors(string $errorField, ?string $errorBag = null): void
    {
        $this->errors = $this->viewFactory->shared('errors', new ViewErrorBag());

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
