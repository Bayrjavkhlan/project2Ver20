<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;


Route::get('login', [LoginController::class,'Login']);
Route::post('login', [LoginController::class,'UserLogin']);
Route::get('register', [LoginController::class,'register']);
Route::post('register', [LoginController::class, 'UserRegister']);
Route::get('workerLogin', [LoginController::class,'workerLogin']);
Route::post('workerLogin', [LoginController::class,'workerLoginPost']);


Route::get('/', [UserController::class, 'userView'])->name('main');

Route::get('workerMain', [WorkerController::class, 'workerView'])
    ->middleware('checkWorkerLogin')  
    ->name('workerMain');
