<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Commands;

use BladeUIKitBootstrap\DefaultComponents;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\error;
use function Laravel\Prompts\info;
use function Laravel\Prompts\note;
use function Laravel\Prompts\select;
use function Laravel\Prompts\table;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;

class MakeComponent extends Command
{
    protected $signature = 'make:blade-ui-kit-bs-component
                            {name? : The name of the component class}
                            {--extends= : The default component to extend}
                            {--force : Overwrite existing files without confirmation}';

    protected $description = 'Create a new Blade UI Kit Bootstrap component class';

    protected Filesystem $files;

    protected array $availableComponents;

    protected bool $withView = false;

    protected ?string $viewName = null;

    public function handle(Filesystem $files): int
    {
        $this->files = $files;
        $this->availableComponents = new DefaultComponents()->components();

        $name = $this->argument('name');
        $extends = $this->option('extends');

        // Step 1: Get parent component to extend
        if (! $extends) {
            $extends = $this->promptForComponent();
        }

        // Step 2: Validate parent component immediately
        $parentClass = $this->resolveParentClass($extends);

        if (\in_array($parentClass, [null, '', '0'], true)) {
            error(\sprintf("Component '%s' not found.", $extends));
            $this->showAvailableComponents();

            return self::FAILURE;
        }

        // Step 3: Get component name
        if (! $name) {
            $name = $this->promptForName($extends);
        }

        // Step 4: Ask about view creation BEFORE generating the component
        $this->withView = confirm('Do you want to create a corresponding view file?', false);

        // Generate the component
        $path = $this->getPath($name, $parentClass);
        $namespace = $this->getNamespace($parentClass);
        $fullClassName = $namespace.'\\'.$name;

        // Check if component already exists
        if ($this->files->exists($path)) {
            if ($this->option('force')) {
                warning(\sprintf('Component [%s] already exists. Overwriting...', $name));
            } elseif (! confirm(\sprintf('Component [%s] already exists. Do you want to overwrite it?', $name), false)) {
                error('Operation cancelled.');

                return self::FAILURE;
            }
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($name, $parentClass));

        info(\sprintf('Component [%s] created successfully.', $fullClassName));

        // Create view file if requested
        if ($this->withView) {
            $this->createView($name, $parentClass);
        }

        note(
            'You can now register your component in config/blade-ui-kit-bootstrap.php:'.PHP_EOL.
            PHP_EOL.
            'Option 1 - Add as a new component:'.PHP_EOL.
            PHP_EOL.
            "    'components' => ServiceProvider::defaultComponents()".PHP_EOL.
            '        ->merge(['.PHP_EOL.
            \sprintf("            '%s' => \\%s::class,", $this->getComponentAlias($name, $parentClass), $fullClassName).PHP_EOL.
            '        ])'.PHP_EOL.
            '        ->components(),'.PHP_EOL.
            PHP_EOL.
            'Option 2 - Replace an existing component:'.PHP_EOL.
            PHP_EOL.
            "    'components' => ServiceProvider::defaultComponents()".PHP_EOL.
            '        ->replace(['.PHP_EOL.
            \sprintf("            '%s' => \\%s::class,", $this->getOriginalAlias($extends), $fullClassName).PHP_EOL.
            '        ])'.PHP_EOL.
            '        ->components(),'
        );

        return self::SUCCESS;
    }

    protected function resolveParentClass(string $extends): ?string
    {
        // Check if it's an alias
        if (isset($this->availableComponents[$extends])) {
            return $this->availableComponents[$extends];
        }

        // Check if it's a full class name that exists
        if (class_exists($extends)) {
            return $extends;
        }

        return null;
    }

    protected function getPath(string $name, string $parentClass): string
    {
        $name = Str::studly($name);
        $subPath = $this->getSubPath($parentClass);

        if ($subPath !== '' && $subPath !== '0') {
            return app_path(\sprintf('View/Components/%s/%s.php', $subPath, $name));
        }

        return app_path(\sprintf('View/Components/%s.php', $name));
    }

    protected function getSubPath(string $parentClass): string
    {
        // Extract the path after "BladeUIKitBootstrap\Components\"
        $baseNamespace = 'BladeUIKitBootstrap\\Components\\';

        if (! str_starts_with($parentClass, $baseNamespace)) {
            return '';
        }

        $relativePath = substr($parentClass, \strlen($baseNamespace));

        // Remove the class name to get only the directory structure
        $parts = explode('\\', $relativePath);
        array_pop($parts); // Remove class name

        return implode('/', $parts);
    }

    protected function getNamespace(string $parentClass): string
    {
        $subPath = $this->getSubPath($parentClass);

        if ($subPath !== '' && $subPath !== '0') {
            $namespaceSubPath = str_replace('/', '\\', $subPath);

            return 'App\\View\\Components\\'.$namespaceSubPath;
        }

        return 'App\\View\\Components';
    }

    protected function makeDirectory(string $path): void
    {
        $directory = \dirname($path);

        if (! $this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }
    }

    protected function buildClass(string $name, string $parentClass): string
    {
        $stub = $this->files->get($this->getStub());

        $stub = $this->replaceNamespace($stub, $parentClass)
            ->replaceClass($stub, $name)
            ->replaceParentClass($stub, $parentClass);

        if ($this->withView) {
            $stub = $this->replaceViewName($stub, $name, $parentClass);
        }

        return $stub;
    }

    protected function getStub(): string
    {
        if ($this->withView) {
            return __DIR__.'/../../stubs/component-with-view.stub';
        }

        return __DIR__.'/../../stubs/component.stub';
    }

    protected function replaceNamespace(string &$stub, string $parentClass): static
    {
        $namespace = $this->getNamespace($parentClass);
        $stub = str_replace('{{ namespace }}', $namespace, $stub);

        return $this;
    }

    protected function replaceClass(string &$stub, string $name): static
    {
        $class = Str::studly($name);

        $stub = str_replace('{{ class }}', $class, $stub);

        return $this;
    }

    protected function replaceParentClass(string &$stub, string $parentClass): string
    {
        $shortName = class_basename($parentClass);

        $stub = str_replace('{{ parentClassImport }}', $parentClass, $stub);
        $stub = str_replace('{{ parentClass }}', $shortName, $stub);

        return $stub;
    }

    protected function replaceViewName(string $stub, string $name, string $parentClass): string
    {
        $alias = $this->getComponentAlias($name, $parentClass);
        $viewName = 'components.'.$alias;

        $stub = str_replace('{{ viewName }}', $viewName, $stub);

        return $stub;
    }

    protected function createView(string $name, string $parentClass): void
    {
        $viewName = Str::kebab($name);
        $subPath = $this->getSubPath($parentClass);

        if ($subPath !== '' && $subPath !== '0') {
            // Split path by slashes, convert each part to kebab-case, then join with slashes
            $parts = explode('/', $subPath);
            $kebabParts = array_map([Str::class, 'kebab'], $parts);
            $viewSubPath = implode('/', $kebabParts);

            $viewPath = resource_path(\sprintf('views/components/%s/%s.blade.php', $viewSubPath, $viewName));
            $displayPath = \sprintf('resources/views/components/%s/%s.blade.php', $viewSubPath, $viewName);
        } else {
            $viewPath = resource_path(\sprintf('views/components/%s.blade.php', $viewName));
            $displayPath = \sprintf('resources/views/components/%s.blade.php', $viewName);
        }

        // Check if view already exists
        if ($this->files->exists($viewPath)) {
            if ($this->option('force')) {
                warning(\sprintf('View [%s] already exists. Overwriting...', $displayPath));
            } elseif (! confirm(\sprintf('View [%s] already exists. Do you want to overwrite it?', $displayPath), false)) {
                warning('View creation skipped.');

                return;
            }
        }

        $this->makeDirectory($viewPath);

        $viewStub = $this->files->get(__DIR__.'/../../stubs/component.view.stub');

        $this->files->put($viewPath, $viewStub);

        info(\sprintf('View [%s] created successfully.', $displayPath));
    }

    protected function getComponentAlias(string $name, string $parentClass): string
    {
        $subPath = $this->getSubPath($parentClass);

        if ($subPath !== '' && $subPath !== '0') {
            // Split path by slashes, convert each part to kebab-case, then join with dots
            $parts = explode('/', $subPath);
            $kebabParts = array_map([Str::class, 'kebab'], $parts);
            $aliasSubPath = implode('.', $kebabParts);

            return $aliasSubPath.'.'.Str::kebab($name);
        }

        return Str::kebab($name);
    }

    protected function getOriginalAlias(string $extends): string
    {
        // If it's already an alias, return it
        if (isset($this->availableComponents[$extends])) {
            return $extends;
        }

        // Otherwise, try to find the alias for this class using PHP 8.4 array_find_key
        return array_find_key(
            $this->availableComponents,
            fn ($class): bool => $class === $extends
        ) ?? Str::kebab(class_basename($extends));
    }

    protected function promptForComponent(): string
    {
        $groups = $this->getComponentGroups();

        // Build a list with category prefix for better organization
        $options = [];

        foreach ($groups as $category => $aliases) {
            foreach ($aliases as $alias) {
                if (isset($this->availableComponents[$alias])) {
                    $options[$alias] = \sprintf('%s: %s', $category, $alias);
                }
            }
        }

        return select(
            label: 'Which component do you want to extend?',
            options: $options,
            scroll: 10
        );
    }

    protected function promptForName(string $extends): string
    {
        // Get parent class name as suggestion
        $parentClass = $this->availableComponents[$extends] ?? $extends;
        $parentClassName = class_basename($parentClass);
        $suggestion = 'Custom'.$parentClassName;

        return text(
            label: 'What is the name of your component class?',
            placeholder: $suggestion,
            default: '',
            required: true,
            hint: 'Use PascalCase (e.g. CustomSaveButton, DangerModal)',
        );
    }

    protected function showAvailableComponents(): void
    {
        $groups = $this->getComponentGroups();

        $rows = [];

        foreach ($groups as $group => $components) {
            foreach ($components as $alias) {
                if (isset($this->availableComponents[$alias])) {
                    $class = $this->availableComponents[$alias];
                    $rows[] = [$group, $alias, $class];
                    $group = ''; // Show group name only once
                }
            }
        }

        table(['Category', 'Alias', 'Class'], $rows);
    }

    protected function getComponentGroups(): array
    {
        return [
            'Buttons' => ['btn', 'form-button', 'link-button', 'help-info'],
            'Action Buttons' => [
                'btn-back', 'btn-back-list', 'btn-back-home', 'btn-archive', 'btn-archives',
                'btn-cancel', 'btn-copy', 'btn-create', 'btn-delete', 'btn-destroy',
                'btn-disable', 'btn-disabled', 'btn-edit', 'btn-email', 'btn-enable',
                'btn-enabled', 'btn-logout', 'btn-confirm-modal-yes', 'btn-confirm-modal-no',
                'btn-move-down', 'btn-move-up', 'btn-phone', 'btn-preview',
                'btn-recycle-bin', 'btn-restore', 'btn-save', 'btn-show', 'btn-website',
            ],
            'Alerts' => ['alert'],
            'Badges' => ['badge'],
            'Forms' => ['form', 'label', 'error'],
            'Inputs' => ['input', 'text', 'textarea', 'select', 'checkbox', 'password', 'email', 'date', 'time', 'hidden'],
            'Modals' => ['modal', 'confirm-modal', 'form-modal'],
        ];
    }
}
