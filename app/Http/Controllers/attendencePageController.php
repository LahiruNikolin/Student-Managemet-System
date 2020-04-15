<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\tution;
use App\subject;
use App\class_student;
use Carbon\Carbon;
use App\attendence;
use App\class_fee;
use Illuminate\Support\Facades\DB;

class attendencePageController extends Controller
{

    public function attendenceDataReturning(){

      $carbon=Carbon::now();
      $date=$carbon->isoFormat('YYYY-MM-DD');
      $attendences=attendence::where(['date' =>  $date])->orderBy('arrived_at', 'desc') ->get();
      $students=array();
      //

      foreach ($attendences as $attendence)
      {
        $student=array();
        $st=Student::where('id', '=', $attendence->sid)->first();

        $cl=tution::where('id', '=', $attendence->cid)->first();

        $subname=subject::where('id', '=', $cl->sub_id)->first()->name;

       
        $student['sid']=$st->id;
        $student['subject']=$subname;
        $student['year']=$st->year;
        $student['time']=$attendence->arrived_at;
         
       array_push($students,$student);

      }

        return $students;

    }
  
    public function attendence()
    {
       
         $students=Student::all();
       
         

        $todayAttend= $this->attendenceDataReturning();

         
         

         return view('Attendence.attendence', ['newStudents' => $students ,'todayStudents'=> $todayAttend,'status'=>0]);
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
        

      //echo $mutable->isoFormat('dddd'); 
      //echo $fee;
      //print_r($stu_data);
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

                $todayAttend= $this->attendenceDataReturning();
                return view('Attendence.attendence', ['newStudents' => $students,'todayStudents'=> $todayAttend,'status'=>2]);

              }
              else{
                //echo "here";
               
              }

            }
        }

        if($flag){

           
          $todayAttend= $this->attendenceDataReturning();
          return view('Attendence.attendence', ['newStudents' => $students,'todayStudents'=> $todayAttend,'status'=>1]);

        }
        
        
        
        
       // return $request->stu_id;
       //


    }

    public function recordFees(Request $request){

      $students=Student::all();

      $carbon=Carbon::now();
      $month = $carbon->isoFormat('MMMM');
      $year = $carbon->isoFormat('G');
      $date=$carbon->isoFormat("YYYY-MM-DD");
      $data= $request->all();

      $size= $data["numOfIds"];

      for ($i = 1; $i <= $size; $i++) {

        $fees=new class_fee;

        $key='class'.$i;
        $fees->sid=$data['studentId'];
        $fees->classid=$data[$key];
        $fees->month=$month;
        $fees->year=$year;
        $fees->paid_at=$date;

        $fees->save();
      
      }
     // print_r($data);
     $todayAttend= $this->attendenceDataReturning();

     return view('Attendence.attendence', ['newStudents' => $students,'todayStudents'=> $todayAttend,'status'=>4]);
    }

    public function studentClasses(Request $request){
      
      $classesArray = array();

      $id=$request->stu_id;
      $classes= class_student::where('sid', '=', $id)->get();

     // return  $classes;


     foreach ($classes as $class){
      $classArray = array();

      $cl=tution::where('id', '=', $class->cid)->first();
      $subject=subject::where('id', '=', $cl->sub_id)->first();
      $classFees=class_fee::where(['sid' =>  $id,'classid'=>$class->cid])->orderBy('paid_at', 'desc')->first();
      $classArray['cid']=$class->cid;
      $classArray['subname']=$subject->name;
      $classArray['year']=$cl->year;
      $classArray['day_time']=$cl->day." @".$cl->from;
      
      if($classFees!=null){
          $classArray['last_payment']=$classFees->month.",".$classFees->year;
      }
      else{
        $classArray['last_payment']="No Previous Payments";
      }
      

      $classArray['fee']=$cl->fee;

     // return $classFees->month;

       

      array_push($classesArray, $classArray);

      //return $classFees;
      
      //return DB::select("select * from class_fees where sid=".$id." order by paid_at desc");
      
     }

     return view('Attendence.recordFees',['classesArray'=>$classesArray,'sid'=>$id]);
       
    }

}
