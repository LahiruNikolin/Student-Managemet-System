<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\tution;
use App\subject;
use App\class_student;
use Carbon\Carbon;
use App\attendence;

class attendencePageController extends Controller
{

  
    public function attendence()
    {
         $students=Student::all();

         return view('Attendence.attendence', ['newStudents' => $students ,'status'=>0]);
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
        

       // echo $mutable->isoFormat('dddd'); 
        //echo $fee;
      // print_r($stu_data);
        return view('Attendence.issueCard')->with($stu_data);
    }
    public function scanCard(Request $request){

      $students=Student::all();

      $flag=true;
      $carbon=Carbon::now();
      $today = $carbon->isoFormat('dddd');
      $date=$carbon->isoFormat('YYYY-MM-DD');
      $time=$carbon->isoFormat('HH:mm:ss');

      //$today="Tuesday";
      $id=$request->stu_id;
      $classes= class_student::where('sid', '=', $id)->get();
      
     // echo $today." ".$date." ".$time;
      
      foreach ($classes as $class)
        {
            //echo $class->cid." ".$today;

            $cl=tution::where('id', '=', $class->cid)->first();

            if($cl->day==$today){

              //echo "match";
              $hasAttend=attendence::where(['cid' =>  $class->cid,'sid'=>$id,'date'=>$date])->first();

              if($hasAttend==null){
                //echo "no atten";
                $flag=false;
                $attend= new attendence;

                $attend->sid=$id;
                $attend->cid=$class->cid;
                $attend->date=$date;
                $attend->arrived_at=$time;
                $attend->save();
                return view('Attendence.attendence', ['newStudents' => $students,'status'=>2]);

              }
              else{
                //echo "here";
               
              }

            }
        }

        if($flag){

          

          return view('Attendence.attendence', ['newStudents' => $students,'status'=>1]);

        }
        
        
        
        
       // return $request->stu_id;
       //


    }

}
