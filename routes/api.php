<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
Route::get('user-index', 'Api\UserController@index')->middleware('auth:api');
Route::get('get-students', 'Api\UserController@getStudents')->middleware('auth:api');
Route::get('get-questions', 'Api\UserController@getQuestions')->middleware('auth:api');
Route::get('student-delete', 'Api\UserController@studentDelete')->middleware('auth:api');
Route::post('student-add', 'Api\UserController@studentAdd')->middleware('auth:api');
Route::post('student-edit', 'Api\UserController@studentEdit')->middleware('auth:api');
Route::post('profile-update', 'Api\UserController@profileUpdate')->middleware('auth:api');
Route::post('add-quiz', 'Api\UserController@addQuiz')->middleware('auth:api');
Route::post('change-password', 'Api\UserController@changePassword')->middleware('auth:api');
Route::post('reset-password', 'Api\UserController@restPassword');
