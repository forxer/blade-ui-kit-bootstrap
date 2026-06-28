<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;

afterEach(function (): void {
    File::deleteDirectory(base_path('.vscode'));
    File::deleteDirectory(base_path('ide-helper'));
});

/**
 * The generated IDE metadata must remain byte-for-byte identical across the
 * extraction to forxer/blade-components-ide-helper. Golden files live in
 * tests/Fixtures/ide-snapshot/.
 */
it('generates byte-identical IDE metadata', function (): void {
    $this->artisan('blade-ui-kit-bs:ide', ['--no-interaction' => true])->assertSuccessful();

    $snapshot = __DIR__.'/../Fixtures/ide-snapshot';

    expect(File::get(base_path('.vscode/blade-ui-kit-bootstrap.code-snippets')))
        ->toBe(File::get($snapshot.'/blade-ui-kit-bootstrap.code-snippets'));

    expect(File::get(base_path('.vscode/blade-ui-kit-bootstrap.html-data.json')))
        ->toBe(File::get($snapshot.'/blade-ui-kit-bootstrap.html-data.json'));

    expect(File::get(base_path('ide-helper/blade-ui-kit-bootstrap/ide.json')))
        ->toBe(File::get($snapshot.'/ide.json'));
});
