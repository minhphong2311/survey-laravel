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

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\SurveyController;

Route::post('auth/signup', [AuthController::class, 'signup']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::domain(env('API_APP_URL'))->group(function () {
	Route::middleware('auth:api')->group(function () {
	    Route::get('auth/user', [AuthController::class, 'user']);
	    Route::get('auth/logout', [AuthController::class, 'logout']);
	    Route::post('search-ic', [ClientsController::class, 'searchIc']);
	    Route::get('questions', [QuestionController::class, 'questions']);
        Route::post('survey', [SurveyController::class, 'survey']);
	});
});
// Route::group(['prefix' => 'auth'], function () {
//     Route::post('login', 'AuthController@login');
//     Route::post('signup', 'AuthController@signup');

//     Route::group(['middleware' => 'auth:api'], function() {
//         Route::get('logout', 'AuthController@logout');
//         Route::get('user', 'AuthController@user');
//     });
// });
