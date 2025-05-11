<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/posts', function () {
    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString();

    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

// Add real-time search route
Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact');
});

// Add this line to your existing routes
Route::post('/contact/send', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

// Add this test route (you can remove it after testing)
Route::get('/test-email', [App\Http\Controllers\ContactController::class, 'testEmail']);

// Admin Authentication Routes
Route::middleware('guest:admin')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login']);
    Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/admin/register', [AdminAuthController::class, 'register']);
});

// Admin Dashboard Routes
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/posts/create', [AdminDashboardController::class, 'create'])->name('admin.posts.create');
    Route::post('/posts', [AdminDashboardController::class, 'store'])->name('admin.posts.store');
    Route::get('/posts/{post}/edit', [AdminDashboardController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/posts/{post}', [AdminDashboardController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [AdminDashboardController::class, 'destroy'])->name('admin.posts.destroy');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});
