<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// Kitchen routes
Route::get('/kitchen', [KitchenController::class, 'dashboard'])->name('kitchen.dashboard');
Route::get('/kitchen/dishes', [KitchenController::class, 'dishes'])->name('kitchen.dishes');
Route::get('/kitchen/stats', [KitchenController::class, 'stats'])->name('kitchen.stats');
Route::get('/kitchen/settings', [KitchenController::class, 'settings'])->name('kitchen.settings');

Auth::routes();

Route::get('/home', [OrderController::class, 'index'])->name('home');

// Dishes CRUD
Route::resource('dishes', App\Http\Controllers\DishesController::class);

// Orders CRUD (works now)
Route::resource('kitchen/orders', OrderController::class)->names([
    'index' => 'kitchen.orders',
    'create' => 'kitchen.orders.create',
    'store' => 'kitchen.orders.store',
    'edit' => 'kitchen.orders.edit',
    'update' => 'kitchen.orders.update',
    'destroy' => 'kitchen.orders.destroy',
]);
