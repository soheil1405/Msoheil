<?php

use App\Http\Controllers\API\V01\Auth\AuthController;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Exception\RouteNotFoundException ;




// Route::post('/register' , [AuthController::class , 'register'])->name('auth.register');

Route::prefix('/v1')->group(function(){
    //authentication Routs
    Route::prefix('/auth' )->group( function(){
        Route::post('/register' , [AuthController::class , 'register'])->name('auth.register');
        Route::post('/login'    , [AuthController::class , 'login'   ])->name('auth.login');
        Route::get('/user' ,      [AuthController::class ,  'user'   ])->name('auth.user');
        Route::post('/logout'   , [AuthController::class , 'logout'  ])->name('auth.logout');
    });


});