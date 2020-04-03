<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\tution;
use App\subject;
use App\class_student;
use Carbon\Carbon;

class attendencePageController extends Controller
{

    
    public function attendence()
    {
         $students=Student::all();
 
         return view('Attendence.attendence')->with("newStudents",$students);
    }

    public function issueCard($id)
    {
        $stu_data=array();
        $subs=array();

        $st=Student::where('id', '=', $id)->first();
        $fullname=$st->fname." ".$st->lname;
        $mobile=$st->mobile;


        $fee=0;
        $classes= class_student::where('sid', '=', $id)->get();

        foreach ($classes as $class)
        {
          // echo $class->cid;
           $cl=tution::where('id', '=', $class->cid)->first();
           
           $subname=subject::where('id', '=', $cl->sub_id)->first()->name;
            $fee+=$cl->fee;
           array_push($subs,$subname);
        }

        $stu_data['name']= $fullname;
        $stu_data['mobile']= $mobile;
        $stu_data['fee']= $fee;
        $stu_data['subs']= $subs;
        $stu_data['id']= $id;
        $mutable = Carbon::now();

       // echo $mutable->isoFormat('dddd'); 
        //echo $fee;
      // print_r($stu_data);
        return view('Attendence.issueCard')->with($stu_data);
    }

}
