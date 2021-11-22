<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RecipeController;

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

Route::prefix('recipe')->name('recipe.')->group(function() {
    Route::get('/', [RecipeController::class, 'index'])->name('index');
    Route::get('/create', [RecipeController::class, 'create'])->name('create');
    Route::post('/', [RecipeController::class, 'store'])->name('store');
    Route::get('/{id}', [RecipeController::class, 'show'])->name('show');
});
