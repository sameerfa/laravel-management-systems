<?php

use App\Http\Controllers\Admin\BindingController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BorrowerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ShelfController;
use App\Http\Controllers\Admin\StudentController;
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

    // Books
    Route::post('books/media', [BookController::class, 'storeMedia'])->name('books.storeMedia');
    Route::resource('books', BookController::class, ['except' => ['store', 'update', 'destroy']]);

    // Binding
    Route::resource('bindings', BindingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Category
    Route::resource('categories', CategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Student
    Route::resource('students', StudentController::class, ['except' => ['store', 'update', 'destroy']]);

    // Shelf
    Route::resource('shelves', ShelfController::class, ['except' => ['store', 'update', 'destroy']]);

    // Borrower
    Route::resource('borrowers', BorrowerController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
