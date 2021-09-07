<?php

use App\Http\Controllers\Api\V1\Admin\ProjectApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Projects
    Route::post('projects/media', [ProjectApiController::class, 'storeMedia'])->name('projects.store_media');
    Route::apiResource('projects', ProjectApiController::class);
});
