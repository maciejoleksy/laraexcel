<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorController;
use App\Exports\AuthorExport;

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

Route::get('/', function () {
    return view('index');
});

// books
Route::prefix('books')->group(function(){

Route::get('/export', [BooksController::class, 'export']);

});

// authors
Route::prefix('authors')->group(function(){

    Route::get('/import', [AuthorController::class, 'importView']);
    Route::post('/import', [AuthorController::class, 'importFile'])->name('author.import');
    Route::get('/export/{author_id}', [AuthorController::class, 'exportAuthor']);

});