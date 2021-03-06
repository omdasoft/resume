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

/*Route::get('/{any}', function () {
    return view('layouts.vue');
})->where('any', '.*');
*/
Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);

Route::post('/send_message',[App\Http\Controllers\IndexController::class,'sendMessage']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//default router handler
Route::get('{path}', [App\Http\Controllers\HomeController::class, 'index'])->where('path','([A-z\d\-\/_.]+)?');

