<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\AuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/login', function (Request $request){
    return $request->employee();
});

Route::post('/employee/register',[AuthController::class, 'register']);
Route::post('/employee/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/employee/profile', [EmployeeController::class, 'showProfile']);
    Route::put('/employee/profile',[EmployeeController::class, 'updateProfile']);
});