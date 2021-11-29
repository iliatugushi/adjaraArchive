<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::post('/getList', [ApiController::class, 'getList']);
Route::post('/getIdentifikator', [ApiController::class, 'getIdentifikator']);
