<?php

use App\Http\Controllers\Api\V1\Admin\BillApiController;
use App\Http\Controllers\Api\V1\Admin\DoctorApiController;
use App\Http\Controllers\Api\V1\Admin\InpatientApiController;
use App\Http\Controllers\Api\V1\Admin\LabApiController;
use App\Http\Controllers\Api\V1\Admin\OutpatientApiController;
use App\Http\Controllers\Api\V1\Admin\PatientApiController;
use App\Http\Controllers\Api\V1\Admin\RoomApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Patients
    Route::apiResource('patients', PatientApiController::class);

    // Doctor
    Route::apiResource('doctors', DoctorApiController::class);

    // Labs
    Route::apiResource('labs', LabApiController::class);

    // Inpatient
    Route::apiResource('inpatients', InpatientApiController::class);

    // Outpatient
    Route::apiResource('outpatients', OutpatientApiController::class);

    // Room
    Route::apiResource('rooms', RoomApiController::class);

    // Bills
    Route::apiResource('bills', BillApiController::class);
});
