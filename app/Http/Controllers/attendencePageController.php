<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Student;
use App\tution;
use App\teacher;
use App\subject;
use App\class_student;
use Carbon\Carbon;
use App\attendence;
use App\class_fee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class attendencePageController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }

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

        $subname=subject::where('id', '=', $cl->sub_id)->first()->subjectName;

       
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
        $todayClasses=$this->todayClasses();
         
         

        return view('Attendence.attendence', ['newStudents' => $students ,'todayStudents'=> $todayAttend,'todayClasses'=> $todayClasses,'status'=>0]);
    }

    public function todayClasses(){
      $mainArray=array();

      $now=Carbon::now()->isoFormat('HH:mm:ss');


      
      $today=Carbon::now()->isoFormat('dddd');
      $classes=tution::where('day', '=',  $today)->get();

      foreach( $classes as $class){

        $subArray=array();
        $subname=subject::where('id', '=', $class->sub_id)->first()->subjectName;
        $teacherName=teacher::where('id', '=', $class->tid)->first()->fname.
        " ".teacher::where('id', '=', $class->tid)->first()->lname;

        $year=$class->year;
        $time=$class->from.'-'.$class->to;
        $status="Coming up";
        if($now>$class->from){
          $status="Ongoing";
        }
        if($now>$class->to){
          $status="Finished";
        }
        $size=0;
        $clzs=class_student::where('cid', '=', $class->id)->get();

        
        foreach( $clzs as $clz){

           
          $size++;
        }


        $subArray['teacherName']= $teacherName;
        $subArray['subName']= $subname;
        $subArray['size']=$size;
        $subArray['year']=$year;
        $subArray['time']=$time;
        $subArray['status'] =$status; 

        array_push($mainArray,$subArray);

      }

     
  return $mainArray;

//class_student


   //   return teacher::all();
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
           
           $subname=subject::where('id', '=', $cl->sub_id)->first()->subjectName;
            $fee+=$cl->fee;
           array_push($subs,$subname);
        }

        $stu_data['name']= $fullname;
        $stu_data['mobile']= $mobile;
        $stu_data['fee']= $fee;
        $stu_data['subs']= $subs;
        $stu_data['id']= $id;
        $stu_data['email']= $st->email;;
        if( file_exists ("C:/Users/Lahiru Nikolin/Downloads/strcode.png" )){ 

          unlink("C:/Users/Lahiru Nikolin/Downloads/strcode.png");

         }

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

              $todayAttend= $this->attendenceDataReturning();
              $todayClasses=$this->todayClasses();

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

               

                 
                return view('Attendence.attendence', ['todayClasses'=> $todayClasses,'newStudents' => $students,'todayStudents'=> $todayAttend,'status'=>2]);

              }
              else{

             

                return view('Attendence.attendence', ['todayClasses'=> $todayClasses,'newStudents' => $students,'todayStudents'=> $todayAttend,'status'=>1]);
               
              }

            }
        }

        if($flag){

           
          $todayAttend= $this->attendenceDataReturning();

          $todayClasses=$this->todayClasses();

          
          return view('Attendence.attendence', ['todayClasses'=> $todayClasses,'newStudents' => $students,'todayStudents'=> $todayAttend,'status'=>8]);

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

      if($size==0){
        return $this->attendence();
      }

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

     $todayClasses=$this->todayClasses();

     

     return view('Attendence.attendence', ['todayClasses'=> $todayClasses,'newStudents' => $students,'todayStudents'=> $todayAttend,'status'=>4]);
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
      $classArray['subname']=$subject->subjectName;
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


    public function movePic(Request $request){

      $email=$request->email;

      
         
       if( file_exists ("C:/Users/Lahiru Nikolin/Downloads/strcode.png" )){
       
        rename('C:/Users/Lahiru Nikolin/Downloads/strcode.png', 'imgs/QRcode.png');
        app('App\Http\Controllers\MailController')->basic_email( $email);
  
        $students=Student::all();
         
           
  
        $todayAttend= $this->attendenceDataReturning();
  
        $todayClasses=$this->todayClasses();
  
       
  
        return view('Attendence.attendence', [ 'todayClasses'=> $todayClasses,'newStudents' => $students,'todayStudents'=> $todayAttend,'status'=>5]);

       }
       else{

        Session::put('status','7');

        return redirect('/attendence');
       }
       
         
    

    }

    public function writeJSON(){

     // return"FM";

    //  $students=Student::all();

      //Storage::disk('public')->put('json/st.json', json_encode($students));

      
      $lastSixMonths=array();
      $lastSixDays=array();
      $lastSixDaysName=array();
      $lastYears=array();

      $date =  Carbon::now();

      //return $date->dayName->subs(1,'day');
    // return $date->subDays(3)->dayName;
    // return $date->subDays(4)->isoFormat('GGGG-MM-DD');


     array_push($lastSixDays,$date->isoFormat('GGGG-MM-DD'));
     array_push($lastSixDaysName,$date->dayName);

      for ($x = 1; $x <= 6; $x++) {

        $d= Carbon::now()->subDays($x)->isoFormat('GGGG-MM-DD');
        $dName=Carbon::now()->subDays($x)->dayName;
         

        array_push($lastSixDays,$d);
        array_push($lastSixDaysName,$dName);
  
      }

    //  dd( $lastSixDays);
     // dd( $lastSixDaysName);
      
    

      $thisMonth =  Carbon::now()->startOfMonth();
      $months=explode(" ",$thisMonth);

      array_push($lastSixMonths,$months[0]) ;

      for ($x = 0; $x <= 4; $x++) {
        
        $months= $date->subMonth()->startOfMonth();
        $months=explode(" ",$months);

        array_push($lastSixMonths,$months[0]) ;
  
      }
    
   
  // dd($lastSixMonths);
    
    $this->lastMonthsAttend($lastSixMonths);
    $this->lastDaysAttend($lastSixDays,$lastSixDaysName);

     
     for ($x = 0; $x <= 5; $x++) {
        
      
      array_push($lastYears,Carbon::now()->subYears($x)->isoFormat('GGGG')) ;

    }
     
    return view('Attendence.viewAttendence',['years' => $lastYears] );

   // print_r($lastSixMonths);
     // echo $date->format('F'); // July
     // echo $date->subMonth()->format('F');

       
  
      //echo( $ok);
      

   // $json = Storage::disk('public')->get('json/st.json');
   // $json = json_decode($json, true);

   // dd($json);

    
      
    }

    public function lastMonthsAttend($months){
      
      
      $mainArray=array();

      $lastSixAttend=array();

     //dd(Carbon::now()->subDays(85)->format('F'));

      for ($x = 0; $x <= 5; $x++) {
        
       

        if($x==0){
          $results = DB::select( DB::raw("select count(*) as total FROM attendence where date>='".$months[$x]."'"));
          $month=Carbon::now()->format('F');
          $lastSixAttend[$month]=$results[0]->total;
          
        }
        else{

          $f=$x;


          $results = DB::select( DB::raw("select count(*) as total 
          FROM attendence where date>='".$months[$x]."' AND date<'".$months[--$f]."'"));

         // $month= Carbon::now()->subMonth($x)->format('F');
          $month= Carbon::now()->startOfMonth()->subDays($x*30)->format('F');
          $lastSixAttend[$month]=$results[0]->total;    
 
        }
  
  
    }

     
     

     // $results=DB::table('students')->get();
     array_push($mainArray,$lastSixAttend);
     //array_push($mainArray,$dRay);

   // dd($mainArray);
     
    //foreach()

    Storage::disk('public')->put('json/attendence.json', json_encode($mainArray));

 
    }

    public function lastDaysAttend($dates,$daysName){
      $mainArray=array();

      $lastSixAttend=array();

      for ($x = 0; $x <= 6; $x++) {

        $results = DB::select( DB::raw("select count(*) as total FROM attendence
        where date='".$dates[$x])."'");
        
         
        $lastSixAttend[$daysName[$x]]=$results[0]->total;

      }

      array_push($mainArray,$lastSixAttend);
      

    //print_r($mainArray);

    Storage::disk('public')->put('json/attendenceWeekly.json', json_encode($mainArray));
    }


    public function redirectAfterReg($stu){

      
      $students=Student::all();
       
         

      $todayAttend= $this->attendenceDataReturning();

      $todayClasses=$this->todayClasses();

     

      return view('Attendence.attendence', [ 'todayClasses'=> $todayClasses,'newStudents' => $students,'todayStudents'=> $todayAttend,'status'=>$stu]);
    }

    public function searchAttendence(Request $request){

       $year= $request->year;
       $month=$request->month;

       $datesInMonth=array();

       $date=$year.'-'.$month.'-'.'01';
       
       $current_date=Carbon::parse($date);

      if(Carbon::parse($date)->isFuture()>0){
        Session::put('futureDate','positive');
        return redirect('viewAttendence');
        
      }
         
       

      $i=0;
       //return  $starDate->addDays(1)->isoFormat('MM');;
       while($current_date->addDays(1)->isoFormat('MM')==$month){

        
        $current_date=Carbon::parse($date)->addDays($i);

        array_push($datesInMonth,$current_date->isoFormat('GGGG-MM-DD'));

        $i++;

       

       }

       $this->getSpecificAttendencce($datesInMonth);

      return view('Attendence.specificAttendence',['year'=>Carbon::parse($date)->isoFormat('GGGG')
      ,'month'=>Carbon::parse($date)->isoFormat('MMMM')]);
    }

    public function getSpecificAttendencce($dates){

      $mainArray=array();

      $attends=array();

      foreach($dates as $date){

        $results = DB::select( DB::raw("select count(*) as total FROM attendence
        where date='".$date."'"));

        $attends[$date]=$results[0]->total;

      }

      array_push($mainArray,$attends);
      

      //print_r($mainArray);
  
      Storage::disk('public')->put('json/specificAttendence.json', json_encode($mainArray));

    

    }

     

}
