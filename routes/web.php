<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/blog', function () {
    return view('blog');
})->name('blog');
Route::get('/feature', function () {
    return view('feature');
})->name('feature');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/about', function () {
    return view('about');
})->name('about');


// Blog page - shows all articles
Route::get('/blog', [ArticleController::class, 'index'])->name('blog');

// Single article page
Route::get('/blog/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Auth middleware for CRUD operations
Route::middleware(['auth', 'verified'])->group(function () {
    // My Articles
    Route::get('/my-articles', [ArticleController::class, 'myArticles'])->name('articles.my');
    
    // Toggle article status
    Route::patch('/articles/{article}/toggle-status', [ArticleController::class, 'toggleStatus'])
        ->name('articles.toggle-status');
    
    // Other CRUD routes...
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});
// Auth routes (if using Laravel Breeze)
Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';