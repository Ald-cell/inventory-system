<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MBuildingController;
use App\Http\Controllers\MRoomController;
use App\Http\Controllers\MItemTypeController;
use App\Http\Controllers\MItemController;
use App\Http\Controllers\TInventoryController;
use App\Http\Controllers\TInventoryTransactionController;
use App\Http\Controllers\TInventoryRoomController;

// Halaman utama
Route::get('/', [DashboardController::class, 'index']);

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)->name('dashboard');

Route::resource('buildings', MBuildingController::class);
Route::resource('rooms', MRoomController::class);
Route::resource('item-types', MItemTypeController::class);
Route::resource('items', MItemController::class);
Route::resource('inventories', TInventoryController::class);
Route::resource('inventory-transactions', TInventoryTransactionController::class);
Route::resource('inventory-rooms', TInventoryRoomController::class);

Route::get(
    '/inventories/{id}/detail',
    [TInventoryController::class, 'detail']
)->name('inventories.detail');

Route::get(
    '/inventories/{id}/pdf',
    [TInventoryController::class, 'pdf']
)->name('inventories.pdf');