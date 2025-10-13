<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::prefix('blade-ui-kit-bs/tests')->name('blade-ui-kit-bs.tests.')->group(function (): void {
    Route::get('/', [TestController::class, 'index'])->name('index');
    Route::get('/buttons-components', [TestController::class, 'buttonsComponents'])->name('buttons-components');
    Route::get('/buttons-actions', [TestController::class, 'buttonsActions'])->name('buttons-actions');
    Route::get('/alerts', [TestController::class, 'alerts'])->name('alerts');
    Route::get('/badges', [TestController::class, 'badges'])->name('badges');
    Route::get('/forms-basics', [TestController::class, 'formsBasics'])->name('forms-basics');
    Route::get('/forms-components', [TestController::class, 'formsComponents'])->name('forms-components');
    Route::get('/inputs-text', [TestController::class, 'inputsText'])->name('inputs-text');
    Route::get('/inputs-advanced', [TestController::class, 'inputsAdvanced'])->name('inputs-advanced');
    Route::get('/modals-types', [TestController::class, 'modalsTypes'])->name('modals-types');
    Route::get('/modals-variations', [TestController::class, 'modalsVariations'])->name('modals-variations');
});
