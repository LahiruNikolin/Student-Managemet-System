<?php

 

//external

Route::get('/External', function () {
    return view('External/staffManagementHome');
});

Route::get('employeeDetails', function () {
    return view('External/employeeDetails');
});

Route::get('reciptionist', function () {
    return view('External/reciptionist');
});

Route::get('clearner', function () {
    return view('External/clearner');
});

Route::get('add-reciptionist', function () {
    return view('External/add-reciptionist');
});

Route::get('addEmployee', function () {
    return view('External/addEmployee');
});

Route::get('add-clearner', function () {
    return view('External/add-clearner');
});

Route::get('employee-detalis', function () {
    return view('External/employee-details');
});

Route::get('remove-list', function () {
    return view('External/remove-list');
});

Route::get('empattendence', function () {
    return view('External/exAttendence');
});

Route::post('addEmp','externelController@addEmp');

Route::post('addReci','externelController@addReci');

Route::post('addCleaner','externelController@addCleaner');

Route::post('addAttendence','externelController@addAttendence');

Route::get('removeList','externelController@removeList');

Route::get('removeRecipList','externelController@removeRecipList');

Route::get('removeCleanList','externelController@removeCleanList');


 
