<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WorkerController;
use App\Http\Middleware\UserAccessMiddleWare;
use App\Http\Middleware\WorkerAccessMiddleWare;


Route::get('login', [LoginController::class,'Login']);
Route::post('login', [LoginController::class,'UserLogin']);
Route::get('register', [LoginController::class,'register']);
Route::post('register', [LoginController::class, 'UserRegister'])->name("Javkhaa");
Route::get('workerLogin', [LoginController::class,'workerLogin']);
Route::post('workerLogin', [LoginController::class,'workerLoginPost']);
Route::get('logout',[LoginController::class, 'logout']);
Route::get('user-info', [UserController::class,'display']);


Route::get("/verify/{token}",[LoginController::class,'verify']);
// Route::get("/verify",function(){
//     return 'tests';
// });

// Route::get('/', [UserController::class, 'userView'])->name('main');

Route::get('/', [DBController::class, 'displayAllBookMain']);
Route::get('/book/{id}', [DBController::class, 'showBookDetails'])->name('book.details')
->middleware(UserAccessMiddleWare::class); // 防止非工作者訪問書
Route::get('user-info',[DBController::class, 'userInfoDisplay'])
->middleware(UserAccessMiddleWare::class);
Route::get('account',[DBController::class, 'accountDisplay'])
->middleware(UserAccessMiddleWare::class);
Route::get('searchBook', [DBController::class ,'searchBook'])->name('search.books')
->middleware(UserAccessMiddleWare::class);






Route::get('workerMain', [WorkerController::class, 'workerView'])
    ->middleware('WorkerAccessMiddleWare')
    ->name('workerMain');
Route::get('workerTest', [WorkerController::class, 'workerTest'])
    ->middleware('WorkerAccessMiddleWare')
    ->name('workerTest');
