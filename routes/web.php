<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Frontend\FrontendController;
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
Route::get('/', [FrontendController::class, 'index']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//default router handler
Route::get('{path}', [FrontendController::class, 'index'])->where('path','([A-z\d\-\/_.]+)?');

