<?php

use App\Http\Controllers\MstCountryController;
use App\Http\Controllers\StateController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/countries', [MstCountryController::class, 'index'])->name('countries.index');

Route::POST('/countries/store', [MstCountryController::class, 'store'])->name('countries.store');

Route::GET('/countries/edit/{id}', [MstCountryController::class, 'edit'])->name('countries.edit');

Route::DELETE('/countries/delete/{id}', [MstCountryController::class, 'destroy'])->name('countries.delete');

Route::GET('/countries/view/{id}', [MstCountryController::class, 'show'])->name('countries.show');


Route::group(['prefix' => '/states', 'as' => 'states.'], function () {

    Route::get('/', [StateController::class, 'index'])->name('index');

    Route::POST('/store', [StateController::class, 'store'])->name('store');

    Route::GET('/edit/{id}', [StateController::class, 'edit'])->name('edit');

    Route::DELETE('/delete/{id}', [StateController::class, 'destroy'])->name('delete');

    Route::GET('/view/{id}', [StateController::class, 'show'])->name('show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
