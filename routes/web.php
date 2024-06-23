<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Auth\LoginController;


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/sample', [StoreController::class, 'index'])->name('stores.index');
    Route::get('/sample/{store}', [StoreController::class, 'show'])->name('stores.show')->middleware('store.access');
    Route::get('/sample/export/{store}', [StoreController::class, 'export'])->name('stores.export')->middleware('store.access');

});

