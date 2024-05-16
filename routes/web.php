<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\UsersController;
use App\Models\Publisher;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

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

// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
// });



Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/search', [HomeController::class , 'search'])->name('search');

Route::get('/book/show/{book}', [HomeController::class , 'show'])->name('book.justshow');
Route::get('/book/{book}/rate/{rate}', [HomeController::class , 'rate'])->name('book.rate');



Route::get('/category/search', [CategoriesController::class , 'search'])->name('category.search');
Route::get('/category', [CategoriesController::class , 'index'])->name('category.index');
Route::get('category/{category}', [CategoriesController::class , 'list'])->name('category.list');

Route::get('publisher/search', [PublishersController::class , 'search'])->name('publisher.search');
Route::get('/publisher', [PublishersController::class , 'index'])->name('publisher.index');
Route::get('publisher/{publisher}', [PublishersController::class , 'list'])->name('publisher.list');

Route::get('author/search', [AuthorsController::class , 'search'])->name('author.search');
Route::get('/author', [AuthorsController::class , 'index'])->name('author.index');
Route::get('author/{author}', [AuthorsController::class , 'list'])->name('author.list');

Route::prefix('/dashboard')->middleware('can:update-books')->group( function(){

    Route::get('/home', [AdminsController::class , 'index'])->name('admin.home');

    // books
    Route::get('/books', [BooksController::class , 'index'])->name('book.index');
    Route::get('/books/create', [BooksController::class , 'create'])->name('book.create');
    Route::post('/books/store', [BooksController::class , 'store'])->name('book.store');
    Route::get('/books/show/{book}', [BooksController::class , 'show'])->name('book.show');
    Route::get('/books/edit/{book}', [BooksController::class , 'edit'])->name('book.edit');
    Route::post('/books/update/{book}', [BooksController::class , 'update'])->name('book.update');
    Route::delete('/books/{book}/destroy', [BooksController::class , 'destroy'])->name('book.destroy');


    // categories
    Route::get('/categories', [CategoriesController::class , 'indexhome'])->name('categories.admin.index');
    Route::get('/categories/create', [CategoriesController::class , 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoriesController::class , 'store'])->name('categories.store');
    Route::get('/categories/show/{category}', [CategoriesController::class , 'show'])->name('categories.show');
    Route::get('/categories/edit/{category}', [CategoriesController::class , 'edit'])->name('categories.edit');
    Route::post('/categories/update/{category}', [CategoriesController::class , 'update'])->name('categories.update');
    Route::delete('/categories/{category}/destroy', [CategoriesController::class , 'destroy'])->name('categories.destroy');

    // publishers
    Route::get('/publishers', [PublishersController::class , 'indexhome'])->name('publishers.admin.index');
    Route::get('/publishers/create', [PublishersController::class , 'create'])->name('publishers.create');
    Route::post('/publishers/store', [PublishersController::class , 'store'])->name('publishers.store');
    Route::get('/publishers/show/{publisher}', [PublishersController::class , 'show'])->name('publishers.show');
    Route::get('/publishers/edit/{publisher}', [PublishersController::class , 'edit'])->name('publishers.edit');
    Route::post('/publishers/update/{publisher}', [PublishersController::class , 'update'])->name('publishers.update');
    Route::delete('/publishers/{publisher}/destroy', [PublishersController::class , 'destroy'])->name('publishers.destroy');

    // authors
    Route::get('/authors', [AuthorsController::class , 'indexhome'])->name('authors.admin.index');
    Route::get('/authors/create', [AuthorsController::class , 'create'])->name('authors.create');
    Route::post('/authors/store', [AuthorsController::class , 'store'])->name('authors.store');
    Route::get('/authors/show/{author}', [AuthorsController::class , 'show'])->name('authors.show');
    Route::get('/authors/edit/{author}', [AuthorsController::class , 'edit'])->name('authors.edit');
    Route::post('/authors/update/{author}', [AuthorsController::class , 'update'])->name('authors.update');
    Route::delete('/authors/{author}/destroy', [AuthorsController::class , 'destroy'])->name('authors.destroy');

    // users
    Route::get('/users', [UsersController::class , 'index'])->name('users.index')->middleware('can:update-users');
    Route::post('/users/update/{user}', [UsersController::class , 'update'])->name('users.update')->middleware('can:update-users');
    Route::delete('/users/{user}/destroy', [UsersController::class , 'destroy'])->name('users.destroy')->middleware('can:update-users');
});


