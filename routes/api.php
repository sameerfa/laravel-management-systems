<?php

use App\Http\Controllers\Api\V1\Admin\BookingApiController;
use App\Http\Controllers\Api\V1\Admin\CustomerApiController;
use App\Http\Controllers\Api\V1\Admin\ExpenseApiController;
use App\Http\Controllers\Api\V1\Admin\ItemTableApiController;
use App\Http\Controllers\Api\V1\Admin\OrderApiController;
use App\Http\Controllers\Api\V1\Admin\PaymentApiController;
use App\Http\Controllers\Api\V1\Admin\ReminderApiController;
use App\Http\Controllers\Api\V1\Admin\RoomApiController;
use App\Http\Controllers\Api\V1\Admin\RoomTypeApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Room Type
    Route::post('room-types/media', [RoomTypeApiController::class, 'storeMedia'])->name('room_types.store_media');
    Route::apiResource('room-types', RoomTypeApiController::class);

    // Room
    Route::apiResource('rooms', RoomApiController::class);

    // Customers
    Route::post('customers/media', [CustomerApiController::class, 'storeMedia'])->name('customers.store_media');
    Route::apiResource('customers', CustomerApiController::class);

    // Expenses
    Route::apiResource('expenses', ExpenseApiController::class);

    // Item Table
    Route::apiResource('item-tables', ItemTableApiController::class);

    // Booking
    Route::apiResource('bookings', BookingApiController::class);

    // Orders
    Route::apiResource('orders', OrderApiController::class);

    // Payments
    Route::apiResource('payments', PaymentApiController::class);

    // Reminder
    Route::apiResource('reminders', ReminderApiController::class);
});
