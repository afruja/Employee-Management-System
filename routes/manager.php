<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Manager Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Manager routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "manager" middleware group. Now create something great!
|
*/

Route::middleware('manager')->group(function () {
    Route::get('/', 'ProfileController@index');
    Route::resource('payment', 'PaymentController');
    Route::resource('profile', 'ProfileController');
    Route::get('/storage/task/{file}', 'TaskController@show');
    Route::resource('leave','LeaveController');
    Route::resource('events', 'EventController');
    Route::resource('attendance', 'AttendanceController');
    Route::resource('task', 'TaskController');
    Route::resource('view_task', 'ViewTaskController');
    Route::resource('notice', 'NoticeBoardController');
    Route::resource('award', 'AwardController');
});
