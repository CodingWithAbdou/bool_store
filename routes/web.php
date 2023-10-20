<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublishersController;
use App\Models\Publisher;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.main');
    })->name('dashboard');
});


Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/search', [HomeController::class , 'search'])->name('search');

Route::get('/book/show/{book}', [HomeController::class , 'show'])->name('book.show');

Route::get('/category/search', [CategoriesController::class , 'search'])->name('category.search');
Route::get('/category', [CategoriesController::class , 'index'])->name('category.index');
Route::get('category/{category:name}', [CategoriesController::class , 'list'])->name('category.list');


Route::get('publisher/search', [PublishersController::class , 'search'])->name('publisher.search');
Route::get('publisher', [PublishersController::class , 'index'])->name('publisher.index');
Route::get('publisher/{publisher:name}', [PublishersController::class , 'list'])->name('publisher.list');
