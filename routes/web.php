<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CommentController;

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('posts', PostController::class);
    Route::resource('users', UserController::class);
    Route::resource('comments', CommentController::class);

    // Route for approving comments
    Route::post('comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
});


// Route::get('/', function () {
//     return view('welcome');
// });
