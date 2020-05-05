<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\tution;
use App\subject;

class mainController extends Controller
{
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


}
