<?php

use Illuminate\Support\Facades\Route;
use App\StudentReg;
use App\StudentDel;

 

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
    return view('mail');
});

Route::post('/fees','attendencePageController@studentClasses');

Route::resource('/student', 'studentsController');


Route::post('/scan', 'attendencePageController@scanCard');

Route::post('/record', 'attendencePageController@recordFees');

//maill
Route::get('/sendbasicemail','MailController@basic_email');
Route::get('/sendhtmlemail','MailController@html_email');
Route::get('/sendattachmentemail','MailController@attachment_email');

//ravi routes
//Route::get('/allS','RStudentController@fun1');

Route::get('/allStudentsDetails','RStudentController@retriveTable');

Route::get('/StudentManagement_index', function () {

    return view('StudentManagemt.student_Management_index')->with('status',0);

});

Route::get('/register', function () {
    return view('StudentManagemt.studentRegister_R');
});


Route::get('/Studentprofile', function () {
    return view('StudentManagemt.StudentProfile');
});

Route::get('/studentUpdate','RStudentController@testupdate');

Route::get('/deletedStudentsDetails','RStudentController@DelretriveTable');

Route::post('/savetask','RStudentController@store');

Route::post('/StudentManagement_index','RStudentController@test');

Route::post('/updatetask','RStudentController@taskupdate');
 

 //Chamathka routes
 Route::get('allocate', function () {
    return view('allocate');
});

Route::get('subject', function () {
    return view('subject');
});

Route::get('allocate-teacher', function () {
    return view('allocate-teacher');
});

Route::get('add-subject', function () {
    return view('add-subject');
});

Route::get('edit-subject', function () {
    return view('edit-subject');
});

Route::post('addSubject','mainController@addSubject');

Route::post('updateSubject','mainController@updateSubject');

Route::post('updateDateTime','mainController@updateDateTime');

Route::post('allocateSub','mainController@allocateSub');

Route::post('deleteSub','mainController@deleteSub');

Route::post('deleteAllocation','mainController@deleteAllocation');
