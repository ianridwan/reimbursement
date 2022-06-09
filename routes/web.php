<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReimbursementController;
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
 

    Route::get('/',[HomeController::class,'index']);
    Route::get('/reimbursement',[ReimbursementController::class,'index']);
    Route::get('/reimbursement-add',[ReimbursementController::class,'reimbursement_add']);
    Route::post('/reimbursement-add',[ReimbursementController::class,'reimbursement_save']);

    

    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/index', [LoginController::class, 'index']);
    Route::post('/register_save', [LoginController::class, 'register_save']);

    Route::get('/login', function () {
        return view('auth.login');
    });





