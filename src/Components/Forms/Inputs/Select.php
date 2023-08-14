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

    /** @var string */
    public $name;

    /** @var string|null */
    public $id;

    /** @var array|Collection */
    public $options;

    /** @var string */
    public $labelAttribute;

    /** @var string */
    public $valueAttribute;

    /** @var string|array|null */
    public $selected;

    /** @var string */
    public $placeholder;

    public function __construct(string $name, $options, $selected = null, string $placeholder = '', string $labelAttribute = 'name', string $valueAttribute = 'id', $id = null, ?string $errorBag = null)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->labelAttribute = $labelAttribute;
        $this->valueAttribute = $valueAttribute;
        $this->selected = $selected;
        $this->placeholder = $placeholder;

        if ($options instanceof Collection) {
            $this->options = $options->pluck($this->labelAttribute, $this->valueAttribute);
        } elseif (is_array($options)) {
            $this->options = $options;
        } else {
            throw new InvalidArgumentException('Invalid options');
        }

        $this->bootCanHaveErrors($name, $errorBag);
    }

    public function isSelected($value): bool
    {
        $selected = old($this->name, $this->selected);

        if (is_array($selected)) {
            return in_array($value, $selected);
        }

        return $value === $selected;
    }

    public function viewName(): string
    {
        return 'components.forms.inputs.select';
    }
}
