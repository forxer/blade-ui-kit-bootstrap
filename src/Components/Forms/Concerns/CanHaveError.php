<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Concerns;

use Illuminate\Support\ViewErrorBag;

trait CanHaveError
{
    /** @var string */
    public $errorField;

    /** @var string */
    public $errorBag = 'default';

    public function errors(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->errorBag);

        return $bag->has($this->errorField) ? $bag->get($this->errorField) : [];
    }

    public function errorField(string $errorField): void
    {
        $this->errorField = $errorField;
    }

    public function errorBag(?string $errorBag = null): void
    {
        if (is_null($errorBag)) {
            return;
        }

        $this->errorBag = $errorBag;
    }

    public function hasError(ViewErrorBag $errors): bool
    {
        return ! empty($this->errors($errors));
    }
}
