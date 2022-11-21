<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//backend apis

Route::get('/get_messages',[MessageController::class,'index']);
Route::get('/delete_message',[MessageController::class,'delete']);
Route::get('/dashboard/myContacts', [ContactController::class, 'index']);
Route::put('/dashboard/myContacts/{id}', [ContactController::class, 'update']);
Route::apiResource('profiles', ProfileController::class);

//fornend apis
Route::get('/myContacts', [\App\Http\Controllers\IndexController::class, 'myContacts']);