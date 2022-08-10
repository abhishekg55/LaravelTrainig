<?php

use App\Http\Controllers\MstCountryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

// Route::middleware(['AuthUser'])->group(function () {

Route::group(['prefix' => '/countries', 'as' => 'countries.'], function () {

    Route::GET('/', [MstCountryController::class, 'index'])->name('index');

    Route::POST('/store', [MstCountryController::class, 'store'])->name('store');

    Route::GET('/edit/{id}', [MstCountryController::class, 'edit'])->name('edit');

    Route::DELETE('/delete/{id}', [MstCountryController::class, 'destroy'])->name('delete');

    Route::GET('/view/{id}', [MstCountryController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/states', 'as' => 'states.'], function () {

    Route::get('/', [StateController::class, 'index'])->name('index');

    Route::POST('/store', [StateController::class, 'store'])->name('store');

    Route::GET('/edit/{id}', [StateController::class, 'edit'])->name('edit');

    Route::DELETE('/delete/{id}', [StateController::class, 'destroy'])->name('delete');

    Route::GET('/view/{id}', [StateController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/posts', 'as' => 'posts.'], function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
    Route::POST('/update/{id}', [PostController::class, 'update'])->name('update');
    Route::GET('/delete/{id}', [PostController::class, 'destroy'])->name('delete');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });
