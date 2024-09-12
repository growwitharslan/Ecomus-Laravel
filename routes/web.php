<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;



Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/',[ProductsController::class,'productsbydb'])->name('home');
});

Route::middleware([UserMiddleware::class])->group(function () {
    Route::get('account/dashboard', [DashboardController::class, 'dashboard'])->name('account.dashboard');
    Route::post('account/logout', [LoginController::class, 'logout'])->name('account.logout');
});
Route::get('account/login', [LoginController::class, 'index'])->name('account.login');
Route::post('account/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
Route::get('account/register', [LoginController::class, 'register'])->name('account.register');
Route::post('account/process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');

Route::middleware([AdminMiddleware::class])->group(function () {
    // Admin dashboard and other protected routes
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('/admin/products', [ProductsController::class, 'index'])->name('admin.products');
    Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories');
    Route::get('/admin/orders', [OrdersController::class, 'index'])->name('admin.orders');
    Route::post('/admin/users/show', [UsersController::class, 'show'])->name('admin.users.show');
    Route::post('/admin/users/update', [UsersController::class, 'update'])->name('admin.users.update');
    Route::post('/admin/user/delete', [LoginController::class, 'destroy'])->name('admin.user.delete');
    Route::post('/admin/products', [ProductsController::class, 'store'])->name('admin.products.store');
    Route::post('/admin/products/delete', [ProductsController::class, 'destroy'])->name('admin.products.delete');
    Route::post('/admin/products/show', [ProductsController::class, 'show'])->name('admin.products.show');
    Route::post('/admin/products/update', [ProductsController::class, 'update'])->name('admin.products.update');
    Route::post('/admin/categories', [CategoriesController::class, 'store'])->name('admin.categories.store');
    Route::post('/admin/categories/delete', [CategoriesController::class, 'destroy'])->name('admin.categories.delete');
    Route::post('/admin/categories/show', [CategoriesController::class, 'show'])->name('admin.categories.show');
    Route::post('/admin/categories/update', [CategoriesController::class, 'update'])->name('admin.categories.update');
});
// Public routes (outside the middleware group)
Route::get('admin/register', [AdminLoginController::class, 'register'])->name('admin.register');
Route::post('process-register', [AdminLoginController::class, 'processRegister'])->name('admin.processRegister');
Route::get('/admin', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('admin/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
