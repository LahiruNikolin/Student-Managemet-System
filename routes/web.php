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

Route::get('/attendence', function () {
    return view('Attendence.attendence');
});

Route::get('/viewAttendence', function () {
    return view('Attendence.viewAttendence');
});

Route::get('/issueCard/{id}',function ($id) {
    return view('Attendence.issueCard')->with('id',$id);
});