<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::middleware('admin')->group(function () {
    Route::get('/','DashboardController@index');
    Route::resource('profile','ProfileController');

    //////////// AJAX REQUEST HANDLE ROUTES ////////////////////
    Route::get('get-designation', 'AjaxController@designation');
    Route::get('/check-email', 'AjaxController@checkEmail');
    Route::get('/check-id', 'AjaxController@checkId');
    Route::post('/events/update', 'AjaxController@event');

    /////////////////// ALL RESOURECE ROUTES /////////////////////
    Route::resource('users','UserController');
    Route::resource('departments','DepartmentController');
    Route::resource('countries','CountryController');
    Route::resource('attendance', 'AttendanceController');
    Route::resource('salaries','SalaryController');
    Route::resource('payment', 'PaymentController');
    Route::resource('events', 'EventController');
    Route::resource('task','TaskController');
    Route::get('/storage/task/{file}', 'TaskController@show');
    Route::resource('leave_types','LeaveTypeController');
    Route::resource('leave','LeaveController');
    Route::resource('award_categories','AwardCategoryController');
    Route::resource('give_awards','GiveAwardController');
    Route::resource('notice','NoticeBoardController');
});
