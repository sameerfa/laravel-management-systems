<?php

use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InpatientController;
use App\Http\Controllers\Admin\LabController;
use App\Http\Controllers\Admin\OutpatientController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoomController;
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

    // Patients
    Route::resource('patients', PatientController::class, ['except' => ['store', 'update', 'destroy']]);

    // Doctor
    Route::resource('doctors', DoctorController::class, ['except' => ['store', 'update', 'destroy']]);

    // Labs
    Route::resource('labs', LabController::class, ['except' => ['store', 'update', 'destroy']]);

    // Inpatient
    Route::resource('inpatients', InpatientController::class, ['except' => ['store', 'update', 'destroy']]);

    // Outpatient
    Route::resource('outpatients', OutpatientController::class, ['except' => ['store', 'update', 'destroy']]);

    // Room
    Route::resource('rooms', RoomController::class, ['except' => ['store', 'update', 'destroy']]);

    // Bills
    Route::resource('bills', BillController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
