<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});
// seach book
Route::post('/frontend-search-book', [App\Http\Controllers\HomeController::class, 'searchbook'])->name('search.book');

// purchase book
Route::get('/frontend-purchase-book', [App\Http\Controllers\HomeController::class, 'purchasebook'])->middleware(['auth'])->name('purchase.book');
Route::get('/frontend-category', [App\Http\Controllers\HomeController::class, 'category'])->name('frontend.category');
Route::get('/frontend-category-book/{id}', [App\Http\Controllers\HomeController::class, 'categoryBook'])->name('frontend.category-book');
Route::get('/frontend-book', [App\Http\Controllers\HomeController::class, 'book'])->name('frontend.book');
Route::get('/frontend-bookDetails/{id}', [App\Http\Controllers\HomeController::class, 'bookDetails'])->name('frontend.bookDetails');
Route::get('/frontend-readMore/{id}', [App\Http\Controllers\HomeController::class, 'readMore'])->middleware(['auth'])->name('frontend.readMore');
Route::post('/checkout/{id}', [App\Http\Controllers\OrderController::class, 'checkout'])->middleware(['auth'])->name('checkout.store');
Route::get('/thank-you', [App\Http\Controllers\OrderController::class, 'thankyou'])->middleware(['auth'])->name('thankyou');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'AdminIndex'])->middleware(['role:Admin'])->name('Admin.home');


Route::controller(CategoryController::class)->middleware(['role:Admin'])->group(function () {
    Route::get('category', 'index')->name('category')->middleware(['role:Admin']);
    Route::get('category/create', 'create')->name('category.create');
    Route::post('category', 'store')->name('category.store');
    Route::get('category/edit/{id}', 'edit')->name('category.edit');
    Route::put('category/update/{id}', 'update')->name('category.update');
    Route::get('category/destroy/{id}', 'destroy')->name('category.destroy');
});
Route::controller(AuthorController::class)->middleware(['role:Admin'])->group(function () {
    Route::get('author', 'index')->name('author');
    Route::get('author/create', 'create')->name('author.create');
    Route::post('author', 'store')->name('author.store');
    Route::get('author/edit/{id}', 'edit')->name('author.edit');
    Route::put('author/update/{id}', 'update')->name('author.update');
    Route::get('author/destroy/{id}', 'destroy')->name('author.destroy');
});
Route::controller(BookController::class)->middleware(['role:Admin'])->group(function () {
    Route::get('book', 'index')->name('book');
    Route::get('book/create', 'create')->name('book.create');
    Route::post('book', 'store')->name('book.store');
    Route::get('book/edit/{id}', 'edit')->name('book.edit');
    Route::put('book/update/{id}', 'update')->name('book.update');
    Route::get('book/destroy/{id}', 'destroy')->name('book.destroy');
});

