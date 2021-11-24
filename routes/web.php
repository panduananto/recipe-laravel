<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardRecipeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/recipe');

Route::prefix('login')->name('login.')->middleware('guest')->group(function() {
    Route::get('/', [LoginController::class, 'index'])->name('index');
    Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('register')->name('register.')->middleware('guest')->group(function() {
    Route::get('/', [RegisterController::class, 'index'])->name('index');
    Route::post('/', [RegisterController::class, 'store'])->name('store');
});

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function() {
    Route::get('/profile', [DashboardProfileController::class, 'index'])->name('profile.index');
    Route::get('/recipe', [DashboardRecipeController::class, 'index'])->name('recipe.index');
    Route::get('/recipe/create', [DashboardRecipeController::class, 'create'])->name('recipe.create');
    Route::post('/recipe', [DashboardRecipeController::class, 'store'])->name('recipe.store');
    Route::get('/recipe/{id}', [DashboardRecipeController::class, 'show'])->name('recipe.show');
    Route::get('/recipe/{id}/edit', [DashboardRecipeController::class, 'edit'])->name('recipe.edit');
    Route::put('/recipe/{id}', [DashboardRecipeController::class, 'update'])->name('recipe.update');
    Route::delete('/recipe/{id}', [DashboardRecipeController::class, 'destroy'])->name('recipe.destroy');
});

Route::prefix('recipe')->name('recipe.')->group(function() {
    Route::get('/', [RecipeController::class, 'index'])->name('index');
    Route::get('/{id}', [RecipeController::class, 'show'])->name('show');
});
