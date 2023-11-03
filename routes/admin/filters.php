<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'filter',
    'as' => 'filter.',
], function () {
    Route::get('/{category}/create', [\App\Http\Controllers\Admin\Filter\CreateFilterController::class, '__invoke'])->name('create');
    Route::post('/{category}/store', [\App\Http\Controllers\Admin\Filter\CreateFilterController::class, 'store'])->name('store');
    Route::get('/{filter}/edit', [\App\Http\Controllers\Admin\Filter\UpdateFilterController::class, '__invoke'])->name('edit');
    Route::post('/{filter}/update', [\App\Http\Controllers\Admin\Filter\UpdateFilterController::class, 'update'])->name('update');
    Route::post('/{filter}/delete', [\App\Http\Controllers\Admin\Filter\DeleteFilterController::class, '__invoke'])->name('delete');
});
