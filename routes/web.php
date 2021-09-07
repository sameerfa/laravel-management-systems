<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuestionOptionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TestAnswerController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\TestResultController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Courses
    Route::post('courses/media', [CourseController::class, 'storeMedia'])->name('courses.storeMedia');
    Route::resource('courses', CourseController::class, ['except' => ['store', 'update', 'destroy']]);

    // Lessons
    Route::post('lessons/media', [LessonController::class, 'storeMedia'])->name('lessons.storeMedia');
    Route::resource('lessons', LessonController::class, ['except' => ['store', 'update', 'destroy']]);

    // Tests
    Route::resource('tests', TestController::class, ['except' => ['store', 'update', 'destroy']]);

    // Questions
    Route::post('questions/media', [QuestionController::class, 'storeMedia'])->name('questions.storeMedia');
    Route::resource('questions', QuestionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Question Options
    Route::resource('question-options', QuestionOptionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Test Results
    Route::resource('test-results', TestResultController::class, ['except' => ['store', 'update', 'destroy']]);

    // Test Answers
    Route::resource('test-answers', TestAnswerController::class, ['except' => ['store', 'update', 'destroy']]);

    // Messages
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('messages/inbox', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('messages/outbox', [MessageController::class, 'outbox'])->name('messages.outbox');
    Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::get('messages/{conversation}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{conversation}', [MessageController::class, 'update'])->name('messages.update');
    Route::post('messages/{conversation}/destroy', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
