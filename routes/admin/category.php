<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'category',
    'as' => 'category.',
], function () {
    Route::get('/', [\App\Http\Controllers\Admin\Category\GetCategoriesController::class, '__invoke'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Admin\Category\CreateCategoryController::class, '__invoke'])->name('create');
    Route::post('/store', [\App\Http\Controllers\Admin\Category\CreateCategoryController::class, 'store'])->name('store');
    Route::get('/{category}', [\App\Http\Controllers\Admin\Category\GetCategoriesController::class, 'get'])->name('get');
    Route::get('/{category}/edit', [\App\Http\Controllers\Admin\Category\UpdateCategoryController::class, '__invoke'])->name('edit');
    Route::post('/{category}/update', [\App\Http\Controllers\Admin\Category\UpdateCategoryController::class, 'update'])->name('update');
    Route::post('/{category}/delete', [\App\Http\Controllers\Admin\Category\DeleteCategoryController::class, '__invoke'])->name('delete');
});
