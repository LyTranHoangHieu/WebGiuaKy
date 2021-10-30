<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\users\loginController;
use \App\Http\Controllers\admin\mainController;
use \App\Http\Controllers\admin\MenuController;

Route::get('/admin/users/login', [loginController::class, 'index'])->name('login');
Route::post('/admin/users/login/store', [loginController::class, 'store']);
Route::get('/admin/users/logout', [loginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function (){
        Route::get('/', [mainController::class, 'index'])->name('admin');
        Route::get('main', [mainController::class, 'index']);

        #menu
        Route::prefix('menu')->group(function (){
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{id}', [MenuController::class, 'show']);
            Route::post('edit/{id}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #product

    });

});

