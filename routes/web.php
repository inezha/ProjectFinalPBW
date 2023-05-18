<?php

use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryNameController;
use App\Http\Controllers\ProfileController;

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


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('layouts.dashboard');
    });
    
    //CRUD DATA
    //Create Data
    //Route mengarah ke halaman index
    Route::get('/question', [QuestionController::class, 'index']);
    //Route mengarah ke halaman tambah data question
    Route::get('/question/create', [QuestionController::class, 'create']);
    //Route untuk menyimpan inputan ke table question
    Route::post('/question', [QuestionController::class, 'store']);
    
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile/{profile_id}/edit', [ProfileController::class, 'edit']);
    Route::put('/profile/{profile_id}/{user_id}', [ProfileController::class, 'update']);
    Route::delete('/profile/{user_id}', [ProfileController::class, 'destroy']);
    
    //CURD Answer
    Route::post('/answer/{questionId}', [AnswerController::class, 'store']);
    Route::delete('/answer/{questionId}', [AnswerController::class,'destroy']);
    //new
    Route::get('/answer/{answer}/edit', [AnswerController::class, 'edit']);
    Route::put('/answer/{answer}', [AnswerController::class, 'update']);
    
    //End CURD Answer
    
    Route::resource('question', QuestionController::class);
    
    
    //CRUD DATA CATEGORY
    //Route untuk semua CRUD langsug
    Route::resource('category_name', CategoryNameController::class);
    
});
