<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

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

      $date = $request->input('date');
      $time = $request->input('time');

      DB::table('teacher')
                ->where('id', $id)
                ->update(['subject' => $sub]);

      DB::table('teacher')
                ->where('id', $id)
                ->update(['date' => $date]);

      DB::table('teacher')
                ->where('id', $id)
                ->update(['time' => $time]);

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
