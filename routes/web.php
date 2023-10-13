<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'LandingController@index')->name('landing');

Route::domain(env('ADMIN_APP_URL'))->group(function () {
	Auth::routes();

	Route::get('/admincp', 'HomeController@index')->name('home');
	Route::get('/logout', 'Auth\LoginController@logout');
	Route::group(['middleware' => 'auth'], function () {
	    Route::get('admincp', 'Admin\DashboardController@index');

	    Route::get('admincp/survey', 'Admin\SurveyController@index');
	    Route::get('admincp/survey/edit/{id}', 'Admin\SurveyController@show');
        Route::get('admincp/survey/delete/{id}', 'Admin\SurveyController@delete');
        Route::get('admincp/survey/show/{item}', 'Admin\SurveyController@showEntries');

	    Route::get('admincp/survey/exportFile', 'Admin\ExportController@exportFile')->name('survey.export-file');

	    Route::get('admincp/manage-staff', 'Admin\StaffController@index');
	    Route::post('admincp/manage-staff/store', 'Admin\StaffController@store');
        Route::get('admincp/manage-staff/delete/{id}', 'Admin\StaffController@delete');

        Route::post('admincp/profile/update', 'Admin\ProfileController@update');

        Route::group(['middleware' => 'SuperAdmin'], function () {
            Route::get('admincp/question', 'Admin\QuestionController@index');
            Route::get('admincp/question/edit/{id}', 'Admin\QuestionController@show');
            Route::post('admincp/question/edit/{id}', 'Admin\QuestionController@update');
            Route::get('admincp/question/create', 'Admin\QuestionController@create');
            Route::post('admincp/question/store', 'Admin\QuestionController@store');
            Route::get('admincp/question/delete/{id}', 'Admin\QuestionController@delete');
            Route::get('admincp/question/show/{item}', 'Admin\QuestionController@showEntries');

            Route::get('admincp/client', 'Admin\ClientController@index');
            Route::get('admincp/client/show/{item}', 'Admin\ClientController@showEntries');
            Route::get('admincp/client/delete/{id}', 'Admin\ClientController@delete');
            Route::post('admincp/client/import', 'Admin\ClientController@import')->name('import');

            Route::post('admincp/question-detail/store/{question_id}', 'Admin\QuestionDetailController@store');
            Route::post('admincp/question-detail/edit/{id}', 'Admin\QuestionDetailController@update');
            Route::get('admincp/question-detail/delete/{id}', 'Admin\QuestionDetailController@delete');

            Route::get('admincp/question-type', 'Admin\QuestionTypeController@index');
            Route::post('admincp/question-type/edit/{id}', 'Admin\QuestionTypeController@update');

            Route::get('admincp/manage-admin', 'Admin\AdminController@index');
            Route::post('admincp/manage-admin/store', 'Admin\AdminController@store');
            Route::post('admincp/manage-admin/edit/{id}', 'Admin\AdminController@update');
            Route::get('admincp/manage-admin/delete/{id}', 'Admin\AdminController@delete');

            Route::get('admincp/manage-superadmin', 'Admin\SuperAdminController@index');
            Route::post('admincp/manage-superadmin/store', 'Admin\SuperAdminController@store');
            Route::post('admincp/manage-superadmin/edit/{id}', 'Admin\SuperAdminController@update');
            Route::get('admincp/manage-superadmin/delete/{id}', 'Admin\SuperAdminController@delete');

            // Route::get('admincp/users', 'Admin\UsersController@index');
            // Route::get('admincp/users/data', 'Admin\UsersController@data');
            // Route::post('admincp/users/update/{id}', 'Admin\UsersController@update');
            // Route::post('admincp/users/store', 'Admin\UsersController@store');
        });
	});
});
