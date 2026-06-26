<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MBuildingController;
use App\Http\Controllers\MRoomController;
use App\Http\Controllers\MItemTypeController;
use App\Http\Controllers\MItemController;
use App\Http\Controllers\TInventoryController;
use App\Http\Controllers\TInventoryTransactionController;
use App\Http\Controllers\TInventoryRoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:Admin'])->group(function () {

    Route::resource('users', UserController::class);

    Route::resource('buildings', MBuildingController::class);

    Route::resource('rooms', MRoomController::class);

    Route::resource('item-types', MItemTypeController::class);
});

/*
|--------------------------------------------------------------------------
| ADMIN & STAFF
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::resource('items', MItemController::class);

    Route::resource('inventories', TInventoryController::class);

    Route::resource(
        'inventory-transactions',
        TInventoryTransactionController::class
    );

    Route::resource(
        'inventory-rooms',
        TInventoryRoomController::class
    );

    Route::get(
        '/inventories/{id}/detail',
        [TInventoryController::class, 'detail']
    )->name('inventories.detail');

    Route::get(
        '/inventories/{id}/pdf',
        [TInventoryController::class, 'pdf']
    )->name('inventories.pdf');

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');
});

require __DIR__.'/auth.php';