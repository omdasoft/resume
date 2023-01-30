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

//backend apis
Route::middleware('auth:sanctum')->group(function() {
    //Route::get('/get_messages',[MessageController::class,'index']);
    //Route::get('/delete_message',[MessageController::class,'delete']);
    Route::apiResource('messages', MessageController::class);
    Route::apiResource('profiles', ProfileController::class);
    Route::apiResource('employments', EmploymentController::class);
    Route::apiResource('portfolios', PortfolioController::class);
    Route::apiResource('educations', EducationController::class);
    Route::apiResource('skills', SkillController::class);
});
