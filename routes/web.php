<?php

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
    return view('login');
});

Route::get('/login', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('public','public')->name('public');
Route::post('/publicregistration', [App\Http\Controllers\publicRegistration::class, 'index'])->name('publicregistration');
Route::view('shop','shop')->name('shop');
Route::post('/shopregistration', [App\Http\Controllers\shopregistration::class, 'index'])->name('shopregistration');
Route::post('/transaction', [App\Http\Controllers\Transaction::class, 'index'])->name('transaction');
Route::view('transaction','transaction')->name('transaction');
//Route::post('/transaction', [App\Http\Controllers\PostTransaction::class, 'create'])->name('transaction');
Route::get('/getlist', [App\Http\Controllers\publicRegistration::class, 'getlist'])->name('getlist');
//Route::post('/getlist', [App\Http\Controllers\Transaction::class, 'getlist'])->name('getlist');
