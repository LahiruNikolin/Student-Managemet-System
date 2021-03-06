<?php

use Illuminate\Support\Facades\Route;
use App\student;
use App\StudentDel;
use App\User;

use Illuminate\Support\Facades\Session;
 

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

Route::get('/', 'attendencePageController@attendence');

Route::get('/attendence', 'attendencePageController@attendence');

Route::get('/viewAttendence', 'attendencePageController@writeJSON');

Route::get('/issueCard/{id}','attendencePageController@issueCard');


 


Route::get('/test',function () {
    return view('Attendence.test');
    
}); 

//Route::get('/test','attendencePageController@todayClasses');

Route::post('/search_attendence','attendencePageController@searchAttendence');


Route::post('/fees','attendencePageController@studentClasses');

Route::resource('/student', 'studentsController');


Route::post('/scan', 'attendencePageController@scanCard');

Route::post('/send', 'attendencePageController@movePic');

Route::post('/record', 'attendencePageController@recordFees');
//admins
Route::get('/adminArea', function () {
    $admins=User::all();
     
    return view('Attendence.adminArea', ['admins' => $admins,'status' => 0]);
});

Route::post('/adminDelete', 'attendencePageController@deleteAdmin');
Route::post('/adminUpdate', 'attendencePageController@updatePassword');

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

Route::get('/studentregister', function () {
    return view('StudentManagemt.studentRegister_R');
});

Route::post('/savetask','RStudentController@retriveProfile');



Route::get('/studentPrint','RStudentController@DelretriveTablePrint');

Route::get('/studentUpdate','RStudentController@testupdate');

Route::get('/deletedStudentsDetails','RStudentController@DelretriveTable');

Route::post('/studentregister2','RStudentController@store');

Route::post('/StudentManagement_index','RStudentController@test');

Route::post('/updatetask','RStudentController@taskupdate');

Route::get('/savetask/{id}','RStudentController@viewprofile');

Route::get('/DelProfiles/{id}','RStudentController@Delviewprofile');

Route::get('indexxx','RStudentController@recoverData');

Route::get('deletedStudentsDetails', 'RStudentController@searchDetails');

Route::get('allStudentsDetails', 'RStudentController@searchDetailsAllStudents');

 

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

Auth::routes();

Route::get('/home', function () {

    if (Session::has('RegFlag'))
    {
        Session::forget('RegFlag');
        return app('App\Http\Controllers\attendencePageController')->redirectAfterReg(6);
    }
    else{
        return app('App\Http\Controllers\attendencePageController')->redirectAfterReg(0);
    }

   

})->middleware('auth');

Route::get('/logout',  function () {
    Auth::logout();
    return redirect('login');
});

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


//thisura routes
Route::get('/PaymentExpenses', function () {
    return view('PaymentExpenses.home');
});

Route::get('/addExpense', function () {
    return view('PaymentExpenses.addExpense');
});

Route::get('/expensesView', function () {
    return view('PaymentExpenses.expensesView');
});

Route::get('/payemntManagement', function () {
    return view('PaymentExpenses.payemntManagement');
});
Route::get('payment', function () {
    return view('PaymentExpenses.payment');
});

Route::get('/TeacherpaymentView', function () {
    return view('PaymentExpenses.TeacherpaymentView');
});
Route::get('/TeacherSalaryCalculate', function () {
    return view('PaymentExpenses.TeacherSalaryCalculate');
});
Route::get('/expensesView', function () {
    return view('PaymentExpenses.expensesView');
});

Route::get('/changeSalarypercentage', function () {
    return view('PaymentExpenses.changeSalarypercentage');
});

//added routes
Route::get('ExpensesReport', function () {
    return view('PaymentExpenses.ExpensesReport');
});

Route::get('paymentreport', function () {
    return view('PaymentExpenses.paymentReport');
});

Route::post('exRep', function () {
    return view('PaymentExpenses.exReport');
});



Route::get('exReport','mainController@expenseReport');

Route::get('paymentReport','mainController@paymentReport');

Route::post('addExpenses','mainController@addExpenses');

Route::post('updateSalaryPercentage','mainController@updateSalaryPercentage');

Route::get('deleteExpense','mainController@deleteExpense');

Route::post('calSal','mainController@calSal');

Route::post('addPayment','mainController@addPayment');

//teacherMana

Route::get('add-teacher', function () {
    return view('TeacherManagement.add-teacher');
});

Route::get('view-teacher', function () {
    return view('TeacherManagement.view-teacher');
});

Route::get('report', function () {
    return view('TeacherManagement.report');
});



Route::post('addTeacher','mainController@addTeacher');

Route::post('updateTeacher','mainController@updateTeacher');

Route::post('deleteTeacher','mainController@deleteTeacher');

Route::get('print','mainController@Report');