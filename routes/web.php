<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ItemTableController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ReminderController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Room Type
    Route::post('room-types/media', [RoomTypeController::class, 'storeMedia'])->name('room-types.storeMedia');
    Route::resource('room-types', RoomTypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Room
    Route::resource('rooms', RoomController::class, ['except' => ['store', 'update', 'destroy']]);

    // Customers
    Route::post('customers/media', [CustomerController::class, 'storeMedia'])->name('customers.storeMedia');
    Route::resource('customers', CustomerController::class, ['except' => ['store', 'update', 'destroy']]);

    // Employee
    Route::resource('employees', EmployeeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Expenses
    Route::resource('expenses', ExpenseController::class, ['except' => ['store', 'update', 'destroy']]);

    // Item Table
    Route::resource('item-tables', ItemTableController::class, ['except' => ['store', 'update', 'destroy']]);

    // Booking
    Route::resource('bookings', BookingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Orders
    Route::resource('orders', OrderController::class, ['except' => ['store', 'update', 'destroy']]);

    // Payments
    Route::resource('payments', PaymentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Reminder
    Route::resource('reminders', ReminderController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
