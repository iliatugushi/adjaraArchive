<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\OperatorController;

use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\AnswerController;



Route::get('/operator/login', [LoginController::class, 'operatorLoginShow'])->name('operator.login');
Route::post('/operator/post-login',  [LoginController::class, 'operatorLogin'])->name('operator.login.submit');



Route::group(['prefix' => 'operator', 'middleware' => ['auth:operator']], function () {
    Route::get('/dashboard',  [OperatorController::class, 'dashboard'])->name('operator.dashboard');



    // Route::resource('exams', ExamController::class);

    // Route::resource('questions', QuestionController::class)->except(['create']);
    // Route::get('questions/create/{exam_id}', [QuestionController::class, 'create'])->name('questions.create');

    // Route::resource('answers', AnswerController::class)->except(['create']);
    // Route::get('answers/create/{question_id}', [AnswerController::class, 'create'])->name('answers.create');

    // Route::resource('operators', OperatorController::class);
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
