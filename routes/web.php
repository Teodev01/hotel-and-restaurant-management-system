<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('rooms', RoomController::class)->except('show');

    Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::post('reservations/{reservation}/status', [ReservationController::class, 'updateStatus']);

    Route::resource('menu', MenuItemController::class)->except('show')->parameters(['menu' => 'menu_item']);

    Route::resource('orders', OrderController::class)->only(['index', 'create', 'store', 'show', 'destroy']);
    Route::post('orders/{order}/status', [OrderController::class, 'updateStatus']);
});