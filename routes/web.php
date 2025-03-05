<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCommentController;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// محصولات
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// پست‌ها
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// مسیرهای کامنت‌ها (فقط ذخیره‌سازی)
Route::post('comment/{type}/{id}', [CommentController::class, 'store'])->name('comment.store');
Route::post('comments/{type}/{id}', [CommentController::class, 'store'])->name('comments.store');

// Route::middleware('auth')->post('/comment/{type}/{id}', [CommentController::class, 'store'])->name('comments.store');

// مسیرهای مدیریت ادمین
Route::middleware(['auth:admin', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // مدیریت محصولات
    Route::get('/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    
    // مدیریت پست‌ها
    Route::get('/posts', [PostController::class, 'adminIndex'])->name('admin.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
    
    // مدیریت کاربران
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users.index');
    Route::post('/users/{user}/toggle-role', [AdminController::class, 'toggleRole'])->name('admin.users.toggleRole');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    
    // مدیریت کامنت‌ها
    Route::get('/comments', [AdminCommentController::class, 'index'])->name('admin.comments.index');
    Route::get('/comments/{comment}/edit', [AdminCommentController::class, 'edit'])->name('admin.comments.edit');
    Route::put('/comments/{comment}', [AdminCommentController::class, 'update'])->name('admin.comments.update');
    Route::delete('/comments/{comment}', [AdminCommentController::class, 'destroy'])->name('admin.comments.destroy');
    Route::post('/comments/{comment}/approve', [AdminCommentController::class, 'approve'])->name('admin.comments.approve');
});

// صفحه اصلی بعد از لاگین
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
