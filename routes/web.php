<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KuisonerController;
use App\Http\Controllers\IsiKuisonerController;

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



Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('home', KuisonerController::class);
    Route::prefix('dashboard')->name('admin.dashboard.')->group(function () {
        Route::resource('kuisoner', KuisonerController::class);
        Route::resource('jawaban', IsiKuisonerController::class);
        Route::get('jawaban/create/{id}', [IsiKuisonerController::class, 'create']);
    });
});
