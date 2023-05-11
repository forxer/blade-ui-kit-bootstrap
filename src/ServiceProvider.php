<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap;

use BladeUIKitBootstrap\Console\InstallCommand;
use BladeUIKit\Components\BladeComponent;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-ui-kit-bootstrap.php', 'blade-ui-kit-bootstrap');
    }

    public function boot(): void
    {
        $this->bootResources();
        $this->bootBladeComponents();

        if ($this->app->runningInConsole()) {
            $this->configurePublishing();

            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blade-ui-kit-bootstrap');
    }

    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $prefix = config('blade-ui-kit-bootstrap.prefix', '');

            /** @var BladeComponent $component */
            foreach (config('blade-ui-kit-bootstrap.components', []) as $alias => $component) {
                $blade->component($component, $alias, $prefix);
            }
        });
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