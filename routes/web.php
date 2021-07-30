<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('form');
Route::get('/list', [HomeController::class, 'list'])->name('list');
Route::post('/store', [HomeController::class, 'store'])->name('added');
Route::get('/{id}', [HomeController::class, 'show'])->name('detail')->where('id', '[0-9]+');