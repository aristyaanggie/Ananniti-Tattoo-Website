<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/{category}', [ShopController::class, 'category'])->name('shop.category');
Route::get('/shop/product/{slug}', [ShopController::class, 'show'])->name('shop.product');

// Admin Auth Routes (Guest)
Route::middleware('guest')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
});

// Admin Routes (Authenticated + Admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Product Management
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/products/{product}/toggle-status', [AdminProductController::class, 'toggleStatus'])->name('products.toggle-status');
    Route::post('/products/{id}/restore', [AdminProductController::class, 'restore'])->name('products.restore');
    Route::delete('/products/gallery/{id}', [AdminProductController::class, 'destroyGalleryImage'])->name('products.gallery.destroy');

    // Content Management
    Route::get('/content', [AdminSectionController::class, 'index'])->name('content.index');
    Route::get('/content/{section}/edit', [AdminSectionController::class, 'edit'])->name('content.edit');
    Route::put('/content/{section}', [AdminSectionController::class, 'update'])->name('content.update');

    // Portfolio Management
    Route::get('/portfolio', [AdminPortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/create', [AdminPortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('/portfolio', [AdminPortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('/portfolio/{portfolio}/edit', [AdminPortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{portfolio}', [AdminPortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{portfolio}', [AdminPortfolioController::class, 'destroy'])->name('portfolio.destroy');

    // Booking Management
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])->name('bookings.show');
    Route::put('/bookings/{booking}', [AdminBookingController::class, 'update'])->name('bookings.update');
});
