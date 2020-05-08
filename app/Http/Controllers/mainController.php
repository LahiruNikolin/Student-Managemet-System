<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\tution;
use App\subject;

class mainController extends Controller
{
  //chamathka's controllers
    public function addSubject(Request $request){

      $subjectName = $request->input('subjectName');
      $subjectCategory = $request->input('subjectCategory');
      $description = $request->input('description');

      $data = array(
        'subjectName'=>$subjectName,
        'subjectCategory'=>$subjectCategory,
        'description'=>$description,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      );

      DB::table('subject')->insert($data);

      return Redirect::back();

    }

    public function updateSubject(Request $request){
      $id = $request->input('id');

      $subjectName = $request->input('subjectName');
      $subjectCategory = $request->input('subjectCategory');
      $description = $request->input('description');

      DB::table('subject')
                ->where('id', $id)
                ->update(['subjectName' => $subjectName]);

      DB::table('subject')
                ->where('id', $id)
                ->update(['subjectCategory' => $subjectCategory]);

      DB::table('subject')
                ->where('id', $id)
                ->update(['description' => $description]);
      return Redirect::back();
    }

    public function updateDateTime(Request $request){
      $id = $request->input('id');

      $date = $request->input('date');
      $time = $request->input('time');

      DB::table('teacher')
                ->where('id', $id)
                ->update(['date' => $date]);

      DB::table('teacher')
                ->where('id', $id)
                ->update(['time' => $time]);

      return Redirect::back();
    }

    public function allocateSub(Request $request){
      $id = $request->input('id');
      $sub = $request->input('sub');

    //  $date = $request->input('date');
      $starttime = $request->input('starttime');
      $endtime = $request->input('endtime');
      $day = $request->input('day');
      $fee = $request->input('fee');
      $year = $request->input('year');
 

 
      DB::table('teacher')
                ->where('id', $id)
                ->update(['subject' => $sub]);

      DB::table('teacher')
                ->where('id', $id)
                ->update(['date' => $day]);

      $time=$starttime.'-'.$endtime;

      DB::table('teacher')
                ->where('id', $id)
                ->update(['time' => $time]);
 


      $sub_id=subject::where('subjectName', '=', $sub)->first()->id;

      $class= new tution;

      $class->sub_id=$sub_id;
      $class->tid=$id;
      $class->fee=$fee;
      $class->day=$day;
      $class->from=Carbon::parse($starttime);
      $class->to=Carbon::parse($endtime);
      $class->year=$year;
      $class->save();

      return Redirect::back();
    }

    public function deleteSub(Request $request){
      $id = $request->input('id');

      DB::table('subject')->where('id', '=', $id)->delete();

      return Redirect::back();
    }

    public function deleteAllocation(Request $request){
      $id = $request->input('id');
      $sub = $request->input('sub');

      $date = $request->input('date');
      $time = $request->input('time');

      DB::table('teacher')
                ->where('id', $id)
                ->update(['subject' => '']);

      DB::table('teacher')
                ->where('id', $id)
                ->update(['date' => '']);

      DB::table('teacher')
                ->where('id', $id)
                ->update(['time' => '']);

      return Redirect::back();
    }

    
    //thisura's controllers

    public function addExpenses(Request $request){
      $amount = $request->input('Amount');
      $purpose = $request->input('Purpose');
  
      $data = array(
        'amount'=>$amount,
        'purpose'=>$purpose,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
      );
  
      DB::table('add_expenses')->insert($data);
  
      return Redirect::back()->withSuccess('success');
  
    }
  
  
  
    public function deleteExpense(Request $request){
      $id = $request->input('id');
  
        DB::table('add_expenses')->where('id', '=', $id)->delete();
  
      return Redirect::back()->withSuccess('success');
  
    }
  
  
  
  
    public function updateSalaryPercentage(Request $request){
      $num = DB::table('salary_percentage')->get();
      $SalCount = count($num);
      $salaryPercentage = $request->input('salaryPercentage');
  
      if($SalCount == 0)
      {
        $data = array(
          'salaryPercentage'=>$salaryPercentage,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        );
  
        DB::table('salary_percentage')->insert($data);
       }else{
         DB::table('salary_percentage')
                ->where('id', 1)
                ->update(['salaryPercentage' => $salaryPercentage],['updated_at' => Carbon::now()]);
       }
  
      return Redirect::back()->withSuccess('success');
  
    }
  
    public function calSal(Request $request){
      $TeacherName = $request->input('TeacherName');
      $TeacherID = $request->input('TeacherID');
      $classID = $request->input('classID');
      $Month = $request->input('Month');
  
      $count = DB::table('class_fees')->where('classid', $classID)->count();
  
      $priceCount = DB::table('class')->where('tid', $TeacherID)->count();
  
      $fee =  DB::table('class')->select('fee')->where('tid', $TeacherID)->first();
  
      $total = $fee;
  
      $data = array('TeacherID' => $TeacherID,
                    'TeacherName' => $TeacherName,
                    'classID' => $classID,
                    'Month' => $Month,
                    'count' => $count,
                    'priceCount' => $priceCount,
                    'fee' =>$total);
  
      return view('PaymentExpenses.payment')
        ->with($data);
  
    }
  
    public function addPayment(Request $request){
      $TeacherName = $request->input('TeacherName');
      $TeacherID = $request->input('TeacherID');
      $classID = $request->input('classID');
      $Month = $request->input('Month');
      $Amount = $request->input('amount');
  
      $data = array('tid' => $TeacherID,
                    'cid' => $classID,
                    'tname' => $TeacherName,
                    'month' => $Month,
                    'amount' => $Amount,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now());
  
      DB::table('payment')->insert($data);
  
      return Redirect::to('TeacherSalaryCalculate')->withSuccess('success');
  
    }



}
