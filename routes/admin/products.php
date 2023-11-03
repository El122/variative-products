<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'product',
    'as' => 'product.',
], function () {
    Route::get('/', [\App\Http\Controllers\Admin\Product\Product\GetProductController::class, '__invoke'])->name('index');
    Route::get('/{category}/create', [\App\Http\Controllers\Admin\Product\Product\CreateProductController::class, '__invoke'])->name('create');
    Route::post('/{category}/store', [\App\Http\Controllers\Admin\Product\Product\CreateProductController::class, 'store'])->name('store');
    Route::get('/{product}/edit', [\App\Http\Controllers\Admin\Product\Product\UpdateProductController::class, '__invoke'])->name('edit');
    Route::post('/{product}/update', [\App\Http\Controllers\Admin\Product\Product\UpdateProductController::class, 'update'])->name('update');
    Route::post('/{product}/delete', [\App\Http\Controllers\Admin\Product\Product\DeleteProductController::class, '__invoke'])->name('delete');

    Route::group([
        'as' => 'variation.',
    ], function () {
        Route::get('/{product}/variation/create', [\App\Http\Controllers\Admin\Product\Variation\CreateVariationController::class, '__invoke'])->name('create');
        Route::post('/{product}/variation/store', [\App\Http\Controllers\Admin\Product\Variation\CreateVariationController::class, 'store'])->name('store');
        Route::get('/variation/{variation}/edit', [\App\Http\Controllers\Admin\Product\Variation\UpdateVariationController::class, '__invoke'])->name('edit');
        Route::post('/variation/{variation}/update', [\App\Http\Controllers\Admin\Product\Variation\UpdateVariationController::class, 'update'])->name('update');
        Route::post('/variation/{variation}/delete', [\App\Http\Controllers\Admin\Product\Variation\DeleteVariationController::class, '__invoke'])->name('delete');
    });
});
