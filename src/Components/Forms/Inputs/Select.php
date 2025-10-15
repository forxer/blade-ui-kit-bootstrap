<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Components\Forms\Inputs;

use BladeUIKitBootstrap\Components\BladeComponent;
use BladeUIKitBootstrap\Concerns\CanHaveErrors;
use Illuminate\Support\Collection;

class Select extends BladeComponent
{
    use CanHaveErrors;

    public private(set) string $id;

    public private(set) array $options;

    public function __construct(
        public string $name,
        array|Collection|null $options = null,
        public string|array|null $selected = null,
        public ?string $placeholder = null,
        string $labelAttribute = 'name',
        string $valueAttribute = 'id',
        ?string $id = null,
        ?string $errorBag = null
    ) {
        $this->id = $id ?? $name;
        $this->options = $this->normalizeOptions($options, $labelAttribute, $valueAttribute);
        $this->bootCanHaveErrors($name, $errorBag);
    }

    /**
     * Normalize options to array format, handling Collections and optgroups.
     */
    private function normalizeOptions(array|Collection|null $options, string $labelAttribute, string $valueAttribute): array
    {
        if ($options === null) {
            return [];
        }

        if (\is_array($options)) {
            return $this->normalizeArrayOptions($options, $labelAttribute, $valueAttribute);
        }

        return $this->normalizeCollectionOptions($options, $labelAttribute, $valueAttribute);
    }

    /**
     * Normalize array options (may contain nested arrays for optgroups).
     */
    private function normalizeArrayOptions(array $options, string $labelAttribute, string $valueAttribute): array
    {
        $normalized = [];

        foreach ($options as $key => $value) {
            if ($value instanceof Collection) {
                // Handle Collection inside array (for optgroups)
                $normalized[$key] = $value->pluck($labelAttribute, $valueAttribute)->toArray();
            } else {
                $normalized[$key] = $value;
            }
        }

        return $normalized;
    }

    /**
     * Normalize Collection options (may be nested for optgroups).
     */
    private function normalizeCollectionOptions(Collection $options, string $labelAttribute, string $valueAttribute): array
    {
        // Check if this is a Collection of Collections (optgroups)
        $firstValue = $options->first();

        if ($firstValue instanceof Collection) {
            // Nested Collections: optgroups
            return $options->map(fn ($group) => $group->pluck($labelAttribute, $valueAttribute)->toArray()
            )->toArray();
        }

        // Flat Collection: simple options
        return $options->pluck($labelAttribute, $valueAttribute)->toArray();
    }

    public function isSelected(string|array|null $value): bool
    {
        $selected = old($this->name, $this->selected);

        if (\is_array($selected)) {
            return \in_array($value, $selected, true);
        }

        return $value === $selected;
    }

    public function viewName(): ?string
    {
        return 'components.forms.inputs.select';
    }
}
