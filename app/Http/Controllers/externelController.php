<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class externelController extends Controller
{
    //akila's controllers
    public function removeList(Request $request){
      $id = $request->input('id');
      DB::table('employee')
                ->where('id', $id)
                ->update(['status' => '0'],['updated_at' => Carbon::now()]);
      return Redirect::to('employeeDetails');
    }

    public function removeRecipList(Request $request){
      $id = $request->input('id');
      DB::table('reciptionist')
                ->where('id', $id)
                ->update(['status' => '0'],['updated_at' => Carbon::now()]);
      return Redirect::to('reciptionist');
    }

    public function removeCleanList(Request $request){
      $id = $request->input('id');
      DB::table('cleaner')
                ->where('id', $id)
                ->update(['status' => '0'],['updated_at' => Carbon::now()]);
      return Redirect::to('clearner');
    }




    public function addAttendence(Request $request){

      $id = $request->input('id');
      $hours = $request->input('hours');
      $date = $request->input('date');

      $type = $request->input('type');

      $data = array(
    'id'=>$id,
    'date'=>$date,
    'hours'=>$hours,
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now()
    );
    DB::table($type)->insert($data);

      return Redirect::back();
    }







    public function addEmp(Request $request){
      $name = $request->input('name');
      $age = $request->input('age');
      $dob = $request->input('birthday');
      $contact = $request->input('contact');
      $email = $request->input('email');
      $address = $request->input('address');
      $status = '1';

      $data = array(
    'name'=>$name,
    'age'=>$age,
    'dob'=>$dob,
    'contactNumber'=>$contact,
    'email'=>$email,
    'address'=>$address,
    'status'=>$status,
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now()
    );

    DB::table('employee')->insert($data);

      return Redirect::to('employeeDetails')->withSuccess('success');
    }

    public function addReci(Request $request){
      $name = $request->input('name');
      $age = $request->input('age');
      $dob = $request->input('birthday');
      $contact = $request->input('contact');
      $email = $request->input('email');
      $address = $request->input('address');
      $status = '1';

      $data = array(
    'name'=>$name,
    'age'=>$age,
    'dob'=>$dob,
    'contactNumber'=>$contact,
    'email'=>$email,
    'address'=>$address,
    'status'=>$status,
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now()
    );

    DB::table('reciptionist')->insert($data);

      return Redirect::to('reciptionist')->withSuccess('success');
    }

    public function addCleaner(Request $request){
      $name = $request->input('name');
      $age = $request->input('age');
      $dob = $request->input('birthday');
      $contact = $request->input('contact');
      $email = $request->input('email');
      $address = $request->input('address');
      $status = '1';

      $data = array(
    'name'=>$name,
    'age'=>$age,
    'dob'=>$dob,
    'contactNumber'=>$contact,
    'email'=>$email,
    'address'=>$address,
    'status'=>$status,
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now()
    );

    DB::table('cleaner')->insert($data);

      return Redirect::to('clearner')->withSuccess('success');
    }
}

