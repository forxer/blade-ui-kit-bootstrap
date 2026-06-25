<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Ide\Emitters;

final class IdeJsonEmitter
{
    /**
     * @param  array<string, class-string>  $tagToClass  tag name => component class
     * @return array<string, mixed>
     */
    public static function emit(array $tagToClass): array
    {
        $components = [];

        foreach ($tagToClass as $tag => $class) {
            $components[] = ['name' => $tag, 'class' => $class];
        }

        return [
            '$schema' => 'https://laravel-ide.com/schema/laravel-ide-v2.json',
            'blade' => ['components' => $components],
        ];
    }
}
