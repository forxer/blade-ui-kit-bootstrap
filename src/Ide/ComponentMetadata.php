<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Ide;

final readonly class ComponentMetadata
{
    /**
     * @param  list<AttributeMetadata>  $attributes
     */
    public function __construct(
        public string $tag,
        public ?string $description,
        public array $attributes,
        public bool $hasSlot,
    ) {}
}
