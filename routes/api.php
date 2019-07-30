<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('/questions', 'QuestionController@index');
//Route::get('/questions/{question}', 'QuestionController@show');

Route::apiResource('/questions','QuestionController');

Route::apiResource("/category",'CategoryController');
Route::apiResource("questions/{questions}/reply",'ReplyController');
