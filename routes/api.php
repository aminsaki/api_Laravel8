<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserController;



Route::get('users' , [UserController::class,'index']);
Route::post('users' , [UserController::class,'create']);
Route::get('users/{id}' , [UserController::class,'show']);
Route::patch('users/{id}',[UserController::class,'update']);
Route::delete('users/{id}',[UserController::class,'delete']);