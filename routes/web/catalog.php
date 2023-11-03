<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Web\Catalog\CatalogController::class, '__invoke'])->name('index');
