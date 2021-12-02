<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\CreatorController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\FondController;
use App\Http\Controllers\Admin\AnaweriController;
use App\Http\Controllers\Admin\SakmeController;
use App\Http\Controllers\Admin\FileController;


//

Route::get('/', [LoginController::class, 'adminLoginShow'])->name('admin.login');
Route::post('/post-login',  [LoginController::class, 'adminLogin'])->name('admin.login.submit');

Route::group(['middleware' => ['auth:admin',]], function () {
    Route::resource('admins', AdminController::class);

    Route::get('/dashboard',  [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::post('/element-details',  [AdminController::class, 'elementDetails'])->name('element.details');
    Route::post('/tree-expand',  [AdminController::class, 'treeExpand'])->name('tree.expand');

    Route::resource('archives', ArchiveController::class);
    Route::resource('types', TypeController::class);
    Route::resource('creators', CreatorController::class);
    Route::resource('fonds', FondController::class);

    Route::resource('anaweris', AnaweriController::class)->except(['create', 'index']);
    Route::get('anaweris/index/{fond}', [AnaweriController::class, 'index'])->name('anaweris.index');
    Route::get('anaweris/create/{fond}', [AnaweriController::class, 'create'])->name('anaweris.create');


    Route::resource('sakmes', SakmeController::class)->except(['create', 'index']);
    Route::get('sakmes/index/{anaweri}', [SakmeController::class, 'index'])->name('sakmes.index');
    Route::get('sakmes/create/{anaweri}', [SakmeController::class, 'create'])->name('sakmes.create');
    Route::get('sakmes/view-files/{sakme}', [SakmeController::class, 'viewFiles'])->name('sakmes.viewFiles');


    Route::resource('files', FileController::class)->except(['create', 'index']);
    Route::get('files/index/{sakme}', [FileController::class, 'index'])->name('files.index');
    Route::get('files/create/{sakme}', [FileController::class, 'create'])->name('files.create');

    Route::resource('roles', RoleController::class);
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
