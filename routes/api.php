<?php

use App\Http\Controllers\Api\V1\Admin\BindingApiController;
use App\Http\Controllers\Api\V1\Admin\BookApiController;
use App\Http\Controllers\Api\V1\Admin\BorrowerApiController;
use App\Http\Controllers\Api\V1\Admin\CategoryApiController;
use App\Http\Controllers\Api\V1\Admin\ShelfApiController;
use App\Http\Controllers\Api\V1\Admin\StudentApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Books
    Route::post('books/media', [BookApiController::class, 'storeMedia'])->name('books.store_media');
    Route::apiResource('books', BookApiController::class);

    // Binding
    Route::apiResource('bindings', BindingApiController::class);

    // Category
    Route::apiResource('categories', CategoryApiController::class);

    // Student
    Route::apiResource('students', StudentApiController::class);

    // Shelf
    Route::apiResource('shelves', ShelfApiController::class);

    // Borrower
    Route::apiResource('borrowers', BorrowerApiController::class);
});
