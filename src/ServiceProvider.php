<?php

namespace BladeUIKitBootstrap;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        // $this->mergeConfigFrom(__DIR__.'/../config/blade-ui-kit-kit-bootstrap.php', 'blade-ui-kit-kit-bootstrap');
    }

    public function boot()
    {
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootPublishing();
    }

    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blade-ui-kit-bootstrap');
    }

    private function bootBladeComponents(): void
    {
        // $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
        //     $prefix = config('blade-ui-kit.prefix', '');
        //     $assets = config('blade-ui-kit.assets', []);

        //     /** @var BladeComponent $component */
        //     foreach (config('blade-ui-kit.components', []) as $alias => $component) {
        //         $blade->component($component, $alias, $prefix);

        //         $this->registerAssets($component, $assets);
        //     }
        // });

        Blade::component('input', \BladeUIKitBootstrap\Components\Forms\Inputs\Input::class);
    }

    private function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            // $this->publishes([
            //     __DIR__.'/../config/blade-ui-kit-bootstrap.php' => $this->app->configPath('blade-ui-kit-bootstrap.php'),
            // ], 'blade-ui-kit-bootstrap-config');

            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/blade-ui-kit-bootstrap'),
            ], 'blade-ui-kit-bootstrap-views');
        }
    }
}