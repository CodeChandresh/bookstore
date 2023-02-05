<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

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

Route::get('/test', function () {
//    Book::createIndex($shards = null, $replicas = null);
    Book::putMapping($ignoreConflicts = true);

});



Route::group(['prefix' => 'admin'], function(){

    Auth::routes();
});

Route::group(['middleware' => 'auth:web'], function(){
    Route::group(['prefix' => 'admin'], function(){

        Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin-dashboard');
        Route::get('create', [App\Http\Controllers\Admin\BookController::class, 'create'])->name('create-book');
        Route::post('store', [App\Http\Controllers\Admin\BookController::class, 'store'])->name('store-book');

        Route::get('edit/{id}', [App\Http\Controllers\Admin\BookController::class, 'edit'])->name('edit-book');
        Route::get('delete/{id}', [App\Http\Controllers\Admin\BookController::class, 'delete'])->name('delete-book');
        Route::get('fetch-books', [App\Http\Controllers\Admin\BookController::class, 'fetchBooks'])->name('fetch-books');


        
    });
});

Route::get('{any}', function () {
    return view('welcome');
})->where('any','.*');