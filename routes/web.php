<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController; //追記
use App\Http\Controllers\BoardController; //追記
use App\Http\Controllers\FavoritesController;// 追記

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BoardController::class, 'index']);

Route::get('/dashboard', [BoardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('users/{id}')->group(function () {
        Route::get('favorites', [UsersController::class, 'favorites'])->name('users.favorites');
    });

    Route::resource('users', UsersController::class, ['only' => 'show']);
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('board', BoardController::class, ['only' => ['store', 'destroy']]);
    
    Route::prefix('board/{id}')->group(function () {
        Route::post('favorite', [FavoritesController::class, 'store'])->name('favorites.favorite');
        Route::delete('unfavorite', [FavoritesController::class, 'destroy'])->name('favorites.unfavorite');
    });
});

require __DIR__.'/auth.php';
