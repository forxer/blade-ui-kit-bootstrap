<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;
use Illuminate\Support\Collection;
use InvalidArgumentException;

class Select extends BladeComponent
{
    use CanHaveErrors;

    public string $id;

    public function __construct(
        public string $name,
        public array|Collection $options,
        public string|array|null $selected = null,
        public ?string $placeholder = null,
        string $labelAttribute = 'name',
        string $valueAttribute = 'id',
        ?string $id = null,
        ?string $errorBag = null
    ) {
        $this->id = $id ?? $name;

        if (\is_array($options)) {
            $this->options = $options;
        } elseif ($options instanceof Collection) {
            $this->options = $options->pluck($labelAttribute, $valueAttribute);
        } else {
            throw new InvalidArgumentException('Invalid options');
        }

        $this->bootCanHaveErrors($name, $errorBag);
    }

    public function isSelected(string|array|null $value): bool
    {
        $selected = old($this->name, $this->selected);

        if (\is_array($selected)) {
            return \in_array($value, $selected, true);
        }

        return $value === $selected;
    }

    public function viewName(): string
    {
        return 'components.forms.inputs.select';
    }
}
