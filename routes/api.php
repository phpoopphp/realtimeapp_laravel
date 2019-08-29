<?php

use Illuminate\Http\Request;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');

});




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('/questions', 'QuestionController@index');
//Route::get('/questions/{question}', 'QuestionController@show');

Route::apiResource('/questions','QuestionController');

Route::apiResource("/category",'CategoryController');
Route::apiResource("questions/{questions}/reply",'ReplyController');

Route::post("/like/{reply}",'LikeController@likeIt');
Route::delete("/like/{reply}",'LikeController@unlikeIt');
