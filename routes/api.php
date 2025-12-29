<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobPostController;
use App\Http\Middleware\CheckIfEmployee;
use App\Http\Middleware\CheckIfEmployer;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/employee/register',[AuthController::class, 'registerEmployee']);
Route::post('/employee/login', [AuthController::class, 'loginEmployee']);

Route::post('/employer/register',[AuthController::class, 'registerEmployer']);
Route::post('/employer/login', [AuthController::class, 'loginEmployer']);

Route::middleware('auth:sanctum')->group(function (){
    Route::middleware(CheckIfEmployee::class)->group(function(){
        Route::get('/employee/profile', [EmployeeController::class, 'showProfile']);
        Route::put('/employee/profile',[EmployeeController::class, 'updateProfile']);
        Route::post('/employee/logout', [AuthController::class, 'logoutEmployee']);
        Route::post('/employee/jobs/{id}',[JobApplicationController::class, 'applyForJob']);
    });
    
    Route::middleware(CheckIfEmployer::class)->group(function (){
        Route::get('/employer/profile', [EmployerController::class, 'showProfile']);
        Route::put('/employer/profile',[EmployerController::class, 'updateProfile']);
        Route::post('/employer/logout', [AuthController::class, 'logoutEmployer']);
        Route::post('/employer/job',[JobPostController::class, 'createJobPost']);
        Route::delete('/post/delete/{id}',[JobPostController::class, 'deleteJobPost']);
        Route::get('/applications',[JobApplicationController::class, 'viewApplications']);
    });

    Route::get('/posts',[JobPostController::class, 'viewAllJobs']);
    Route::get('/posts/{id}',[JobPostController::class, 'show']);

});