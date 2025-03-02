<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// مسیرهای محصولات
// Route::resource('products', ProductController::class);

// مسیرهای پست‌ها
// Route::resource('posts', PostController::class);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// مسیرهای کامنت‌ها (فقط ذخیره‌سازی)
Route::post('comments/{type}/{id}', [CommentController::class, 'store'])->name('comments.store');
Route::middleware('auth')->post('/comment/{type}/{id}', [CommentController::class, 'store'])->name('comments.store');
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/comments', [AdminCommentController::class, 'index'])->name('admin.comments.index');
    Route::get('/comments/{comment}/edit', [AdminCommentController::class, 'edit'])->name('admin.comments.edit');
    Route::put('/comments/{comment}', [AdminCommentController::class, 'update'])->name('admin.comments.update');
    Route::delete('/comments/{comment}', [AdminCommentController::class, 'destroy'])->name('admin.comments.destroy');
    Route::post('/comments/{comment}/approve', [AdminCommentController::class, 'approve'])->name('admin.comments.approve');
});


// پنل ادمین (فقط ادمین و سوپر ادمین دسترسی دارند)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/posts', [PostController::class, 'adminIndex'])->name('admin.posts.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users.index');
    Route::post('/admin/users/{user}/toggle-role', [AdminController::class, 'toggleRole'])->name('admin.users.toggleRole');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
});

use App\Http\Controllers\AdminCommentController;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/comments', [AdminCommentController::class, 'index'])->name('admin.comments.index');
    Route::post('/comments/{comment}/approve', [AdminCommentController::class, 'approve'])->name('admin.comments.approve');
    Route::delete('/comments/{comment}', [AdminCommentController::class, 'destroy'])->name('admin.comments.destroy');
});




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
