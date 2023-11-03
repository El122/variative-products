<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'product',
    'as' => 'product.',
], function () {
    Route::get('/', [\App\Http\Controllers\Admin\Product\GetProductController::class, '__invoke'])->name('index');
    Route::get('/{category}/create', [\App\Http\Controllers\Admin\Product\CreateProductController::class, '__invoke'])->name('create');
    Route::post('/{category}/store', [\App\Http\Controllers\Admin\Product\CreateProductController::class, 'store'])->name('store');
    Route::get('/{product}/edit', [\App\Http\Controllers\Admin\Product\UpdateProductController::class, '__invoke'])->name('edit');
    Route::post('/{product}/update', [\App\Http\Controllers\Admin\Product\UpdateProductController::class, 'update'])->name('update');
    Route::post('/{product}/delete', [\App\Http\Controllers\Admin\Product\DeleteProductController::class, '__invoke'])->name('delete');
});
