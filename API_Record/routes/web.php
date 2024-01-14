<?php

use App\Http\Controllers\RecordController;
use App\Http\Controllers\LoginController;
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


Route::get('/', [LoginController::class, 'See'])->name('login');
//Route::post('loginApi', [LoginController::class, 'WEBlogin'])->name('loginApi');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('record', [RecordController::class, 'index'])->name('record');

});
//Route::get('view/detail/users', [HomeController::class, 'index'])->name('view/datail/users');

//Route::get('login', [LoginController::class, 'WEBlogin'])->name('login');
