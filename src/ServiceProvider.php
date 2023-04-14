<?php

namespace BladeUIKitBootstrap;

use BladeUIKitBootstrap\Console\InstallCommand;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-ui-kit-bootstrap.php', 'blade-ui-kit-bootstrap');
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blade-ui-kit-bootstrap');

        if ($this->app->runningInConsole()) {
            $this->configurePublishing();

            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    private function configurePublishing(): void
    {
        $this->publishes([
            __DIR__.'/../config/blade-ui-kit-bootstrap.php' => $this->app->configPath('blade-ui-kit-bootstrap.php'),
        ], 'blade-ui-kit-bootstrap-config');

        $this->publishes([
            __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/blade-ui-kit-bootstrap'),
        ], 'blade-ui-kit-bootstrap-views');
    }
}