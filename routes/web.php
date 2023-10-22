<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome')->name('home');

Route::view('manage', 'manage')
    ->middleware(['auth'])
    ->name('manage');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get("/search", [BookController::class, 'getSearchView'])->name('search');

Route::post('/search', [BookController::class, 'search']);

Route::get('/category', [CategoryController::class, 'getCategoriesView'])->name('categories');

Route::post('/category', [CategoryController::class, 'getCategories']);

require __DIR__ . '/auth.php';
