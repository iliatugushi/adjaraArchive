<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/clear', [HomeController::class, 'clear'])->name('clear');
