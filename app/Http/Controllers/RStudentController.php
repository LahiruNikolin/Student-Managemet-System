<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentDel;
use App\student;
use App\tution;
use App\subject;
use App\teacher;
use App\class_student;
use App\class_student_dels;

class RStudentController extends Controller
{
    public function store(Request $request){

        $StudentReg = new student; 

        $studentArray=array();

 
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=> 'required',
            'address'=>'required',
            'email'=>'required|email',
            'telephone'=>'required',
            'birthday'=>'required|date',
            

        ]);
         

        $firstname=$StudentReg->fname=$request->input('firstname');
        $lastname=$StudentReg->lname=$request->input('lastname');
        $address=$StudentReg->address=$request->input('address');
        $email=$StudentReg->email=$request->input('email');
        $tp=$StudentReg->mobile=$request->input('telephone');
        $dob=$StudentReg->DOB=$request->input('birthday');
        $status=$StudentReg->status=$request->input('status');
        $year=$StudentReg->year=$request->input('year');

        $StudentReg->save();

 
        $classArray=array();
      // $classArray2=array();

        $alldata= student::where('email', '=',$email)->get();

        foreach ($alldata as $data){
             
            
            //$data=student::where(['email'=> $email])->orderBy('created_at', 'desc')->first();
            
            $studentArray['id']= $data->id;
            $studentArray['email']=$data->email;
            $studentArray['year']=$data->year;
           // print_r($data);
        

        }
      
        
    $classes=tution::where('year', '=', $year)->get();
     
        foreach ($classes as $class){
            $subArray=array();
            $subname=subject::where('id', '=', $class->sub_id)->first()->subjectName;
            $tFname=teacher::where('id', '=', $class->tid)->first()->fname;
            $tLname=teacher::where('id', '=', $class->tid)->first()->lname;
            $tName= $tFname.' '.$tLname;
            $classId=$class['id'];

            $subArray['teacherName']= $tName;
            $subArray['subName']= $subname;
            $subArray['classId']=$classId;
            
           /* 
            $classdataArray = array();

            $classdata=tution::where(['year'=> $year])->first();

            $classdataArray['Cid']= $classdata->id;
            $TID= $classdata->tid;
            $classdataArray['year']= $classdata->year;

            $classdata=teacher::where( ['id' => $TID])->first();
 
            $classdataArray['Tname']=$classdata->fname." ".$classdata->lname;

            
 
        break;
        */
            array_push($classArray, $subArray);
        }

       // return $classArray;

      

        return view('StudentManagemt.StudentSubject_register',['classArray'=>$classArray,
        'studentArray'=>$studentArray]);

    }
     

    public function retriveProfile(Request $request){
        $classIds=array();
        $email=$request->email;
        $size=$request->size;
        $sid=$request->sid;
        $data= $request->all();
        
      
        //$cl= $data['class1'];

        for ($x = 1; $x <= $size; $x++) {
        
             $cid=0;
             if(isset($data['class'.$x])){
                
                $cid=$data['class'.$x];
                //array_push($classIds, $cid) ;
                $classStu = new class_student;
                
                $classStu->sid=$sid;
                $classStu->cid=$cid;
                $classStu->save();

             }
              
            
      
          }

        //return $classIds;


        $profileArray = array();        
        $alldata= student::where('email', '=', $email)->get();
        
        foreach ($alldata as $data){
            
            $dataArray = array();
        
            $data=student::where(['email'=> $email])->first();
            $dataArray['id']= $data->id;
            $dataArray['fullname']= $data->fname." ".$data->lname;
            $dataArray['address']=$data->address;
            $dataArray['email']=$data->email;
            $dataArray['telephone']=$data->mobile;
            $dataArray['DOB']=$data->DOB;
            $dataArray['status']=$data->status;
            $dataArray['year']=$data->year;

            array_push($profileArray, $dataArray);
            

        break;

        }
        $profileArray1 = array();
/*
        $classStu = new class_student;

       

        $stuID=($request->Sid);
        $classID=($request->Cid);
        
        $classStu->sid=$stuID;
        $classStu->cid=$classID;
        $classStu->save();
     */      
        
        $classStudents=class_student::where('sid', '=', $sid)->get();

        
        foreach($classStudents as $classStudent){

       // $classStudent=class_student::where(['cid'=> $classID])->first();    
 
            $dataArray1 = array();
            
            $studID=$classStudent->sid;
            $ClassID=$classStudent->cid;
            $dataArray1['Cid']=$ClassID;

           

            $class=tution::where( ['id' => $ClassID])->first();
            $subID= $class->sub_id;
            $TID= $class->tid;
            
            $subject=subject::where( ['id' => $subID])->first();
            $dataArray1['subName']=$subject->subjectName;
            
            $teacher=teacher::where( ['id' => $TID])->first();
            $dataArray1['Tname']=$teacher->fname." ".$teacher->lname;
            
            array_push($profileArray1, $dataArray1);
        
        }

        return view('StudentManagemt.StudentProfile',['profileArray'=>$profileArray,'profileArray1'=>$profileArray1]);

        }


    
    public function retriveTable(){

       $data2=student::all();
       
       return view('StudentManagemt.allStudentsDetails')->with('StudentsData',$data2);


    }
    public function DelretriveTable(){
        
        $deleteData=StudentDel::all();
 
        return view('StudentManagemt.deleted_students')->with('DeleteData',$deleteData);
 
     }
     public function DelretriveTablePrint(){
        
        $deleteData=StudentDel::all();
 
        return view('StudentManagemt.StudentPrint')->with('DeleteData',$deleteData);
 
     }


     public function searchDetails(Request $request){

        $s=$request->input('s');
    
        $DeleteData = StudentDel::where('firstname', 'like', '%' . $s . '%')->orWhere('lastname', 'like','%' . $s . '%')->orWhere('address', 'like','%' . $s . '%')->orWhere('email', 'like','%' . $s . '%')->orWhere('DOB', 'like','%' . $s . '%')->orWhere('telephone', 'like','%' . $s . '%') ->get();
    
       return view('StudentManagemt.deleted_students', compact('DeleteData'));
    
    
    }
    public function searchDetailsAllStudents(Request $request){

        $s=$request->input('s');
    
        $StudentsData = student::where('fname', 'like', '%' . $s . '%')->orWhere('lname', 'like','%' . $s . '%')->orWhere('address', 'like','%' . $s . '%')->orWhere('email', 'like','%' . $s . '%')->orWhere('DOB', 'like','%' . $s . '%')->orWhere('mobile', 'like','%' . $s . '%') ->get();
    
    
       return view('StudentManagemt.allStudentsDetails', compact('StudentsData',$StudentsData));
    
    
    }
    
public function test(Request $request){

    $studentdata=student::find($request->st_id);
    
    $studentdata->delete();

    $Sid = $studentdata->id;
    $firstname=$studentdata->fname;
    $lastname=$studentdata->lname;
    $address=$studentdata->address;
    $email=$studentdata->email;
    $tp=$studentdata->mobile;
    $year=$studentdata->year;
    $status=$studentdata->status;
    $dob=$studentdata->DOB;


    $studentId=($request->st_id);

    $studentdata1=class_student::where('sid','=',$studentId)->get();

    foreach($studentdata1 as $classStudent){

        $classStudent=class_student::where(['sid'=> $studentId])->first();    

        $dataArray1 = array();
        $id=$classStudent->id;
        $sid=$classStudent->sid;
        $cid=$classStudent->cid;
        
        $classStudent->delete();

        $classDels = new class_student_dels; 
        $classDels->sid=$sid;
        $classDels->cid=$cid;
        $classDels->save();

    
    }



    $StudentDel = new StudentDel;

    $StudentDel->id=$Sid;
    $StudentDel->firstname=$firstname;
    $StudentDel->lastname=$lastname;
    $StudentDel->address=$address;
    $StudentDel->email=$email;
    $StudentDel->telephone=$tp;
    $StudentDel->year=$year;
    $StudentDel->status=$status;
    $StudentDel->DOB=$dob;

    $StudentDel->save();

    return view('StudentManagemt.student_Management_index')->with('status',1);

        
  }




public function testupdate(Request $request){

    $profileArray1 = array();    
    $studentdata=student::find($request->st_id);
    $StID= ($request->st_id);
    
    $classID=($request->Cid);
    
    $classStudents=class_student::where('sid', '=', $StID)->get();

        
    foreach($classStudents as $classStudent){

    $classStudent=class_student::where(['sid'=> $StID])->first();    

    $dataArray1 = array();

        $studID=$classStudent->sid;
        $ClassID=$classStudent->cid;

        $classStudent=tution::where( ['id' => $ClassID])->first();
        $subID= $classStudent->sub_id;
        $TID= $classStudent->tid;
        $dataArray1['Cid']=$classStudent->id;

        $classdata=subject::where( ['id' => $subID])->first();
        $dataArray1['subName']=$classdata->subjectName;

        $classdata1=teacher::where( ['id' => $TID])->first();
        $dataArray1['Tname']=$classdata1->fname." ".$classdata1->lname;
        
        array_push($profileArray1, $dataArray1);
    
    break;
    }
    return view('StudentManagemt.studentUpdate',['profileArray1'=>$profileArray1])->with('stuUpdate',$studentdata);

    


}
    public function taskupdate(Request $request){

        $profileArray=array();

        
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=> 'required',
            'address'=>'required',
            'email'=>'required|email',
            'telephone'=>'required',
            'year'=>'required',
            'birthday'=>'required|date',
            

        ]);

    $id=$request->id;
    $firstname=$request->firstname;
    $lastname=$request->lastname;
    $address=$request->address;
    $email=$request->email;
    $tp=$request->telephone;
    $dob=$request->birthday;
    $year=$request->year;
    $status=$request->status;

 

    $studentdata1=student::find($id);
    
    $studentdata1->fname=$firstname;
    $studentdata1->lname= $lastname;
    $studentdata1->address=$address;
    $studentdata1->email=$email;
    $studentdata1->mobile=$tp;
    $studentdata1->DOB=$dob;
    $studentdata1->year=$year;
    $studentdata1->status=$status;

     $studentdata1->save();


    
    $alldata= student::where('id', '=', $id)->get();
        
    foreach ($alldata as $data){
        
        $dataArray = array();
    
        $data=student::where(['id'=> $id])->orderBy('created_at', 'desc')->first();
        $dataArray['id']= $data->id;
        $dataArray['fullname']= $firstname." ".$lastname;
        $dataArray['address']=$address;
        $dataArray['email']=$email;
        $dataArray['telephone']=$tp;
        $dataArray['DOB']=$dob;
        $dataArray['year']=$year;
        $dataArray['status']=$status;


        array_push($profileArray, $dataArray);

    }
    
    $classStu = new class_student;

    $profileArray1 = array();  
    
    $classID=($request->Cid);
    
    $classStu->sid=$id;
    $classStu->cid=$classID;
    $classStu->save();
    
    $classStudents=class_student::where('cid', '=', $classID)->get();

    
    foreach($classStudents as $classStudent){

    $classStudent=class_student::where(['cid'=> $classID])->first();    

    $dataArray1 = array();
        
        $studID=$classStudent->sid;
        $ClassID=$classStudent->cid;
        $dataArray1['Cid']=$ClassID;

        $classStudent=tution::where( ['id' => $ClassID])->first();
        $subID= $classStudent->sub_id;
        $TID= $classStudent->tid;

        $classdata=subject::where( ['id' => $subID])->first();
        $dataArray1['subName']=$classdata->subjectName;

        $classdata1=teacher::where( ['id' => $TID])->first();
        $dataArray1['Tname']=$classdata1->fname." ".$classdata1->lname;
        
        array_push($profileArray1, $dataArray1);
    break;
    }

    return view('StudentManagemt.StudentProfile',['profileArray'=>$profileArray,'profileArray1'=>$profileArray1]);

}

public function viewprofile($id){

    $profileArray=array();

    $student=student::where('id', '=', $id)->first();

    $firstname=$student->fname;
    $lastname=$student->lname;
    $address=$student->address;
    $email=$student->email;
    $tp=$student->mobile;
    $dob=$student->DOB;
    $year=$student->year;
    $status=$student->status;

    foreach ($student as $data){

        $dataArray=array();

            $data=student::where(['id'=> $id])->first();
            $dataArray['id']= $data->id;
            $dataArray['fullname']= $firstname." ".$lastname;
            $dataArray['address']=$address;
            $dataArray['email']=$email;
            $dataArray['telephone']=$tp;
            $dataArray['DOB']=$dob;
            $dataArray['year']=$year;
            $dataArray['status']=$status;

            array_push($profileArray, $dataArray);

    break;
    }

    $profileArray1 = array(); 
       
    $classStudents=class_student::where('sid', '=', $id)->get();

    foreach($classStudents as $classStudent){ 

    $dataArray1 = array();
        
        $studID=$classStudent->sid;
        $ClassID=$classStudent->cid;
        $dataArray1['Cid']=$ClassID;

        $classStudent=tution::where( ['id' => $ClassID])->first();
        $subID= $classStudent->sub_id;
        $TID= $classStudent->tid;

        $classdata=subject::where( ['id' => $subID])->first();
        $dataArray1['subName']=$classdata->subjectName;

        $classdata1=teacher::where( ['id' => $TID])->first();
        $dataArray1['Tname']=$classdata1->fname." ".$classdata1->lname;
        
        array_push($profileArray1, $dataArray1);
    
    }

    //print_r($profileArray1);

    return view('StudentManagemt.StudentProfile',['profileArray'=>$profileArray,'profileArray1'=>$profileArray1]);

}
public function Delviewprofile($id){

    $rowsArray=array();

    $student=StudentDel::where('id', '=', $id)->first();

    $firstname=$student->firstname;
    $lastname=$student->lastname;
    $address=$student->address;
    $email=$student->email;
    $tp=$student->telephone;
    $dob=$student->DOB;
    $year=$student->year;
    $status=$student->status;

    foreach ($student as $data){

        $dataArray=array();

            $data=StudentDel::where(['id'=> $id])->first();
            $dataArray['id']= $data->id;
            $dataArray['fullname']= $firstname." ".$lastname;
            $dataArray['address']=$address;
            $dataArray['email']=$email;
            $dataArray['telephone']=$tp;
            $dataArray['DOB']=$dob;
            $dataArray['year']=$year;
            $dataArray['status']=$status;

            array_push($rowsArray, $dataArray);

    break;
    }
    
    $profileArray1 = array(); 
       
    
    $classStudents=class_student_dels::where('sid', '=', $id)->get();

    
    foreach($classStudents as $classStudent){

    $classStudent=class_student_dels::where(['sid'=> $id])->first();    

    $dataArray1 = array();
        
        $studID=$classStudent->sid;
        $ClassID=$classStudent->cid;

        $classStudent=tution::where( ['id' => $ClassID])->first();
        $subID= $classStudent->sub_id;
        $TID= $classStudent->tid;

        $classdata=subject::where( ['id' => $subID])->first();
        $dataArray1['subName']=$classdata->subjectName;

        $classdata1=teacher::where( ['id' => $TID])->first();
        $dataArray1['Tname']=$classdata1->fname." ".$classdata1->lname;
        
        array_push($profileArray1, $dataArray1);
        
    break;
    }


    return view('StudentManagemt.Del_Stu_Profile',['rowsArray'=>$rowsArray,'profileArray1'=>$profileArray1]);

}


public function recoverData(Request $request){

    $studenRec= new student;

    $studentId=($request->st_id);

    $student=StudentDel::where('id', '=', $studentId)->first();
    
    $student->delete();

    $studenRec->fname=$student->firstname;
    $studenRec->lname=$student->lastname;
    $studenRec->address=$student->address;
    $studenRec->email=$student->email;
    $studenRec->mobile=$student->telephone;
    $studenRec->DOB=$student->DOB;
    $studenRec->year=$student->year;
    $studenRec->status=$student->status;

    $studenRec->save();

    foreach($student as $students){

        $students=StudentDel::where(['id'=> $studentId])->orderBy('created_at', 'desc')->first();
        $Did=$studentId;
        $NDid=$Did + '1';

    }




    $studentdata1=class_student_dels::where('sid','=',$studentId)->get();

    foreach($studentdata1 as $classStudent){

        $classStudent=class_student_dels::where(['sid'=> $studentId])->first();   

        $dataArray1 = array();
        $id=$classStudent->id;
        $sid=$classStudent->sid;
        $cid=$classStudent->cid;
        
        $classStudent->delete();

        $classSt = new class_student; 
        $classSt->sid=$NDid;
        $classSt->cid=$cid;
        $classSt->save();

    }



    

    return view('StudentManagemt.student_Management_index')->with('status',2);


}


}














