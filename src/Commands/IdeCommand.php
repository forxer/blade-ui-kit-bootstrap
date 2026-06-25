<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Commands;

use BladeUIKitBootstrap\Ide\ComponentIntrospector;
use BladeUIKitBootstrap\Ide\Emitters\HtmlDataEmitter;
use BladeUIKitBootstrap\Ide\Emitters\IdeJsonEmitter;
use BladeUIKitBootstrap\Ide\Emitters\SnippetsEmitter;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

use function Laravel\Prompts\info;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\note;
use function Laravel\Prompts\text;

class IdeCommand extends Command
{
    protected $signature = 'blade-ui-kit-bs:ide
                            {--output= : Output directory (relative to the project root)}
                            {--snippets : Generate the VS Code snippets file}
                            {--json : Generate the VS Code Custom Data file}
                            {--ide-json : Generate the PhpStorm/Laravel Idea ide.json file}';

    protected $description = 'Generate IDE metadata (snippets, VS Code Custom Data, PhpStorm) for the components';

    /** @var list<string> */
    private const array ALL_FORMATS = ['snippets', 'json', 'ide-json'];

    private const array FILENAMES = [
        'snippets' => 'blade-ui-kit-bootstrap.code-snippets',
        'json' => 'blade-ui-kit-bootstrap.html-data.json',
        'ide-json' => 'blade-ui-kit-bootstrap.ide.json',
    ];

    public function handle(Filesystem $files): int
    {
        $formats = $this->resolveFormats();
        $directory = $this->resolveDirectory();

        $files->ensureDirectoryExists($directory);

        $components = config('blade-ui-kit-bootstrap.components', []);
        $prefix = (string) config('blade-ui-kit-bootstrap.prefix', '');
        $version = config('blade-ui-kit-bootstrap.bootstrap_version')->value;

        $model = new ComponentIntrospector($prefix, $version)->introspect($components);

        $written = [];

        foreach ($formats as $format) {
            $payload = match ($format) {
                'snippets' => SnippetsEmitter::emit($model),
                'json' => HtmlDataEmitter::emit($model),
                'ide-json' => IdeJsonEmitter::emit($this->tagToClass($components, $prefix)),
            };

            $path = $directory.DIRECTORY_SEPARATOR.self::FILENAMES[$format];
            $files->put($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR).PHP_EOL);
            $written[] = $path;
        }

        info('Generated '.\count($written).' IDE metadata file(s) in '.$directory);

        foreach ($written as $path) {
            $this->line('  • '.$path);
        }

        note(
            "Commit these files so your team gets completion without re-running this command.\n".
            "• Snippets work out of the box (fallback).\n".
            '• The .html-data.json feeds the VS Code extension (primary).'
        );

        return self::SUCCESS;
    }

    /**
     * @return list<string>
     */
    private function resolveFormats(): array
    {
        $selected = array_values(array_filter(
            self::ALL_FORMATS,
            fn (string $format): bool => (bool) $this->option($format)
        ));

        if ($selected !== []) {
            return $selected;
        }

        if (! $this->input->isInteractive()) {
            return self::ALL_FORMATS;
        }

        return multiselect(
            label: 'Which IDE metadata files do you want to generate?',
            options: [
                'snippets' => 'VS Code snippets (.code-snippets) — fallback, zero install',
                'json' => 'VS Code Custom Data (.html-data.json) — for the extension (primary)',
                'ide-json' => 'PhpStorm / Laravel Idea (ide.json)',
            ],
            default: self::ALL_FORMATS,
            required: true,
        );
    }

    private function resolveDirectory(): string
    {
        $output = $this->option('output');

        if ($output === null && $this->input->isInteractive()) {
            $output = text(label: 'Output directory', default: '.vscode');
        }

        $output ??= '.vscode';

        return str_starts_with((string) $output, DIRECTORY_SEPARATOR) ? $output : base_path($output);
    }

    /**
     * @param  array<string, class-string>  $components
     * @return array<string, class-string>
     */
    private function tagToClass(array $components, string $prefix): array
    {
        $map = [];

        foreach ($components as $alias => $class) {
            $map[ComponentIntrospector::tagFor($prefix, $alias)] = $class;
        }

        return $map;
    }
}
