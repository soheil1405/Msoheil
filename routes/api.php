<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::prefix('/v1')->group(function(){


    //authentication Routs
    include  __DIR__ . '/v1/Auth_Routs.php';

    //channel Routs
    include __DIR__ . '/v1/Channel_Routs.php';


});
