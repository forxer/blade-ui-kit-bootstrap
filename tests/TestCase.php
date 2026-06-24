<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Tests;

use BladeUIKitBootstrap\ServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class,
        ];
    }
}
