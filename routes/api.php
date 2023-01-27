<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\Frontend\Api\FrontEndController;
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
Route::apiResource('employments', EmploymentController::class);
Route::apiResource('portfolios', PortfolioController::class);
Route::apiResource('educations', EducationController::class);
Route::apiResource('skills', SkillController::class);
Route::delete('/employments/details/{id}', [EmploymentController::class, 'deleteDetails']);
Route::get('/download/{fileName}', [ProfileController::class, 'download']);

//frontend api routes
Route::prefix('frontend')->group(function () {
    Route::get('/profile', [FrontEndController::class, 'profile']);
    Route::get('/employment', [FrontEndController::class, 'employment']);
    Route::get('/latest_projects', [FrontEndController::class, 'latestProjects']);
    Route::get('/featured_project', [FrontEndController::class, 'featuredProject']);
    Route::get('/skills', [FrontEndController::class, 'skills']);
    Route::get('/education', [FrontEndController::class, 'education']);
    Route::post('/send_message', [FrontEndController::class, 'sendMessage']);
});