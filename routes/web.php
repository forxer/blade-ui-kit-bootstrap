<?php

declare(strict_types=1);

use BladeUIKitBootstrap\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::prefix('blade-ui-kit-bs/tests')->name('blade-ui-kit-bs.tests.')->group(function (): void {
    Route::get('/', [TestController::class, 'index'])->name('index');
    Route::get('/buttons', [TestController::class, 'buttons'])->name('buttons');
    Route::get('/alerts', [TestController::class, 'alerts'])->name('alerts');
    Route::get('/badges', [TestController::class, 'badges'])->name('badges');
    Route::get('/forms', [TestController::class, 'forms'])->name('forms');
    Route::get('/inputs', [TestController::class, 'inputs'])->name('inputs');
    Route::get('/modals', [TestController::class, 'modals'])->name('modals');
});
