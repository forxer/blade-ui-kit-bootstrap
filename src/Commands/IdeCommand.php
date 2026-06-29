<?php

declare(strict_types=1);

namespace BladeUIKitBootstrap\Commands;

use BladeUIKitBootstrap\ServiceProvider;
use Forxer\BladeComponentsIdeHelper\Commands\AbstractIdeCommand;
use Forxer\BladeComponentsIdeHelper\Definition\IdeTarget;

class IdeCommand extends AbstractIdeCommand
{
    protected $signature = 'blade-ui-kit-bs:ide
                            {--output= : Output directory for the VS Code files (default: .vscode)}
                            {--ide-output= : Output directory for ide.json (default: ide-helper/blade-ui-kit-bootstrap)}
                            {--snippets : Generate the VS Code snippets file}
                            {--json : Generate the VS Code Custom Data file}
                            {--ide-json : Generate the PhpStorm/Laravel Idea ide.json file}';

    protected $description = 'Generate IDE metadata (snippets, VS Code Custom Data, PhpStorm) for the components';

    protected function target(): IdeTarget
    {
        return ServiceProvider::ideTarget();
    }
}
