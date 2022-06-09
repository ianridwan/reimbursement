<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReimbursementController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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
use Illuminate\Support\Facades\Auth;
 

Route::get('/home',[HomeController::class,'index']);

/*Route Reimbursement*/
Route::get('/reimbursement',[ReimbursementController::class,'index']);
Route::get('/reimbursement-add',[ReimbursementController::class,'reimbursement_add']);
Route::get('/reimbursement-edit/{int}',[ReimbursementController::class,'reimbursement_edit']);
Route::post('/reimbursement-edit',[ReimbursementController::class,'reimbursement_update']);
Route::post('/reimbursement-add',[ReimbursementController::class,'reimbursement_save']);
Route::post('/reimbursement-process',[ReimbursementController::class,'reimbursement_process']);
Route::delete('/reimbursement-delete/{int}',[ReimbursementController::class,'reimbursement_delete']);


/*Route Auth*/
Route::post('/register_save', [LoginController::class, 'register_save']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/',[LoginController::class,'index']);
Route::get('/register', function () {
    return view('auth.register');
});

/*Route Reimbursement*/
Route::get('/user',[UserController::class,'index']);
Route::get('/user-add',[UserController::class,'user_add']);
Route::get('/user-edit/{int}',[UserController::class,'user_edit']);
Route::post('/user-edit',[UserController::class,'user_update']);
Route::post('/user-add',[UserController::class,'user_save']);
Route::delete('/user-delete/{int}',[UserController::class,'user_delete']);


