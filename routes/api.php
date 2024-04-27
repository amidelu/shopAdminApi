<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::post('/login', [UserController::class, 'createUser']);
// // Authentication Middleware
// Route::group(['middleware'=> ['auth:sanctum']], function () {
//     Route::any('/courseList', [CourseController::class,'courseList']);
// });

Route::group(['namespace'=>'Api'], function(){
    Route::post('/login', 'UserController@createUser');
    Route::group(['middleware'=>'auth:sanctum'], function() {
        Route::any('/courseList', 'CourseController@courseList');
    });
});
