<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Employee routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "employee" middleware group. Now create something great!
|
*/

Route::middleware('employee')->group(function () {
    Route::get('/', 'ProfileController@index');
    Route::resource('profile', 'ProfileController');
    Route::get('/storage/task/{file}', 'TaskController@show');
    Route::resource('leave','LeaveController');
    Route::resource('events', 'EventController');
    Route::resource('attendance', 'AttendanceController');
    Route::resource('task', 'TaskController');
    Route::resource('notice', 'NoticeBoardController');
    Route::resource('award', 'AwardController');
});
