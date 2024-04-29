<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Api'], function(){
    Route::post('/login', 'UserController@createUser');
    Route::group(['middleware'=>'auth:sanctum'], function() {
        Route::any('/courseList', 'CourseController@courseList');
    });
});
