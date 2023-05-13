<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::controller(MovieController::class)->group(function () {
        Route::get('/store-movies', 'store');
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/movie/{movie}', 'show')->name('detail-movie');
        Route::get('/movie/edit/{movie}', 'edit')->name('edit-movie');

        Route::post('/movie/update', 'update')->name('update-movie');
        Route::delete('/movie/delete/{id}', 'destroy')->name('destroy-movie');

        Route::post('/movie/search', 'search')->name('search-movie');
    });


});



