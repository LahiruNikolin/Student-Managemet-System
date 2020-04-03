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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/attendence', 'attendencePageController@attendence');

Route::get('/viewAttendence', function () {
    return view('Attendence.viewAttendence');
});

Route::get('/issueCard/{id}','attendencePageController@issueCard');

 

Route::get('/test',function () {
    return view('Inc.scanForm');
});
Route::get('/test1',function () {
    return view('Attendence.test1');
});
Route::resource('/student', 'studentsController');


Route::post('/scan', 'attendencePageController@scanCard');

 