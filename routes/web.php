<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminOrderController;

// ==========================================
// PUBLIC ROUTES (Guest & All)
// ==========================================
Route::get('/', [HomeController::class, 'index']);

// Login
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'webLogin']);

// Register
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'webRegister']);

// Logout
Route::post('/logout', [AuthController::class, 'webLogout']);


// ==========================================
// USER ROUTES (Wajib Login / role: user, admin)
// ==========================================
Route::middleware(['role:user,admin'])->group(function () {
    // Explore / Services
    Route::get('/explore', [ServiceController::class, 'webIndex']);
    Route::get('/services', [ServiceController::class, 'webIndex']);
    Route::get('/services/create', [ServiceController::class, 'webCreate']);
    Route::post('/services', [ServiceController::class, 'webStore']);
    Route::get('/services/{id}/edit', [ServiceController::class, 'webEdit']);
    Route::put('/services/{id}', [ServiceController::class, 'webUpdate']);
    Route::delete('/services/{id}', [ServiceController::class, 'webDestroy']);
    Route::get('/services/{id}/whatsapp', [ServiceController::class, 'webContactWhatsapp']);
    Route::get('/services/{id}', [ServiceController::class, 'webShow']);
    Route::get('/services/{id}/order', [OrderController::class, 'webCreate']);
    Route::post('/services/{id}/order', [OrderController::class, 'webStore']);

    // My Services
    Route::get('/my-services', [ServiceController::class, 'myService']);

    // Orders (Incoming, History, Create, Show, Cancel, Status)
    Route::get('/orders/incoming', [OrderController::class, 'webIncoming']);
    Route::get('/orders/incoming/{id}', [OrderController::class, 'webIncomingShow']);
    Route::post('/orders/incoming/{id}/status', [OrderController::class, 'webUpdateStatus']);
    Route::post('/orders/incoming/{id}/start', [OrderController::class, 'webStartOrder']);
    Route::post('/orders/incoming/{id}/complete', [OrderController::class, 'webCompleteOrder']);
    Route::get('/orders/history', [OrderController::class, 'webHistory']);
    Route::get('/orders', [OrderController::class, 'webIndex']);
    Route::get('/orders/{id}', [OrderController::class, 'webShow']);
    Route::post('/orders/{id}/cancel', [OrderController::class, 'webCancel']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'webShow']);
    Route::get('/profile/edit', [ProfileController::class, 'webEdit']);
    Route::put('/profile/edit', [ProfileController::class, 'webUpdate']);
});


// ==========================================
// ADMIN ROUTES (Wajib Login & role: admin)
// ==========================================
Route::middleware(['role:admin'])->group(function () {
    // Categories CRUD
    Route::get('/categories', [CategoryController::class, 'webIndex']);
    Route::get('/categories/create', [CategoryController::class, 'webCreate']);
    Route::post('/categories', [CategoryController::class, 'webStore']);
    Route::get('/categories/{id}/edit', [CategoryController::class, 'webEdit']);
    Route::put('/categories/{id}', [CategoryController::class, 'webUpdate']);
    Route::delete('/categories/{id}', [CategoryController::class, 'webDestroy']);

    // Admin Dashboard & Management
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

    // Admin - Kelola User
    Route::get('/admin/users', [AdminUserController::class, 'index']);
    Route::delete('/admin/users/{id}/delete', [AdminUserController::class, 'destroy']);

    // Admin - Kelola Jasa
    Route::get('/admin/services', [AdminServiceController::class, 'index']);
    Route::delete('/admin/services/{id}/delete', [AdminServiceController::class, 'destroy']);

    // Admin - Kelola Orders
    Route::get('/admin/orders', [AdminOrderController::class, 'index']);
    Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show']);
});
