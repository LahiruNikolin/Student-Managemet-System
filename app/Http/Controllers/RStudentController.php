<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentDel;
use App\student;


class RStudentController extends Controller
{
    public function store(Request $request){

        $StudentReg = new student; 

        $rowsArray=array();

 
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=> 'required',
            'address'=>'required',
            'email'=>'required|email',
            'telephone'=>'required',
            'year'=>'required',
            'birthday'=>'required|date',
            

        ]);
         

        $firstname=$StudentReg->fname=$request->input('firstname');
        $lastname=$StudentReg->lname=$request->input('lastname');
        $address=$StudentReg->address=$request->input('address');
        $email=$StudentReg->email=$request->input('email');
        $tp=$StudentReg->mobile=$request->input('telephone');
        $dob=$StudentReg->DOB=$request->input('birthday');
        $year=$StudentReg->year=$request->input('year');
        $status=$StudentReg->status=$request->input('status');
        $subject1=$StudentReg->subject1=$request->input('Subject1');
        $teacher1=$StudentReg->teacher1=$request->input('Teach1');
        $subject2=$StudentReg->subject2=$request->input('Subject2');
        $teacher2=$StudentReg->teacher2=$request->input('Teach2');
        $subject3=$StudentReg->subject3=$request->input('Subject3');
        $teacher3=$StudentReg->teacher3=$request->input('Teach3');
        $subject4=$StudentReg->subject4=$request->input('Subject4');
        $teacher4=$StudentReg->teacher4=$request->input('Teach4');
        
        
        $StudentReg->save();

        $alldata= student::where('email', '=', $email)->get();
        
        foreach ($alldata as $data){
            
            $dataArray = array();
        
            $data=student::where(['email'=> $email])->orderBy('created_at', 'desc')->take(1)->first();
            $dataArray['id']= $data->id;
            $dataArray['fullname']= $firstname." ".$lastname;
            $dataArray['address']=$address;
            $dataArray['email']=$email;
            $dataArray['year']=$year;
            $dataArray['telephone']=$tp;
            $dataArray['DOB']=$dob;
            $dataArray['year']=$year;
            $dataArray['status']=$status;
            $dataArray['subject1']=$subject1;
            $dataArray['teacher1']=$teacher1;
            $dataArray['subject2']=$subject2; 
            $dataArray['teacher2']=$teacher2;
            $dataArray['subject3']=$subject3;
            $dataArray['teacher3']=$teacher3;
            $dataArray['subject4']=$subject4;
            $dataArray['teacher4']=$teacher4;

            array_push($rowsArray, $dataArray);

           // print_r($data);
        break;

        }

        

        return view('StudentManagemt.StudentProfile',['rowsArray'=>$rowsArray,'email'=>$email]);

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

    $DeleteData = StudentDel::where([
        
        ['firstname', 'like', '%' . $s . '%'],
        ['lastname', 'like','%' . $s . '%'],
        ['address', 'like','%' . $s . '%'],
        ['email', 'like','%' . $s . '%'],
        ['DOB', 'like','%' . $s . '%'],
        ['telephone', 'like','%' . $s . '%'],

    ])->get();

   return view('StudentManagemt.deleted_students', compact('DeleteData'));


}

public function test(Request $request){



    $studentdata=student::find($request->st_id);
    $studentdata->delete();
    
    $firstname=$studentdata->fname;
    $lastname=$studentdata->lname;
    $address=$studentdata->address;
    $email=$studentdata->email;
    $tp=$studentdata->mobile;
    $year=$studentdata->year;
    $status=$studentdata->status;
    $dob=$studentdata->DOB;
    $subject1=$studentdata->subject1;
    $teacher1=$studentdata->teacher1;
    $subject2=$studentdata->subject2;
    $teacher2=$studentdata->teacher2;
    $subject3=$studentdata->subject3;
    $teacher3=$studentdata->teacher3;
    $subject4=$studentdata->subject4;
    $teacher4=$studentdata->teacher4;

    $StudentDel = new StudentDel;

    $StudentDel->firstname=$firstname;
    $StudentDel->lastname=$lastname;
    $StudentDel->address=$address;
    $StudentDel->email=$email;
    $StudentDel->telephone=$tp;
    $StudentDel->year=$year;
    $StudentDel->status=$status;
    $StudentDel->DOB=$dob;
    $StudentDel->subject1=$subject1;
    $StudentDel->teacher1=$teacher1;
    $StudentDel->subject2=$subject2;
    $StudentDel->teacher2=$teacher2;
    $StudentDel->subject3=$subject3;
    $StudentDel->teacher3=$teacher3;
    $StudentDel->subject4=$subject4;
    $StudentDel->teacher4=$teacher4;
    
    $StudentDel->save();

    return view('StudentManagemt.student_Management_index')->with('status',1);

        
  }




public function testupdate(Request $request){

            
    $studentdata=student::find($request->st_id);
    return view('StudentManagemt.studentUpdate')->with('stuUpdate',$studentdata);


}
    public function taskupdate(Request $request){

        $rowsArray=array();

        
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
    $subject1=$request->Subject1;
    $teacher1=$request->Teach1;
    $subject2=$request->Subject2;
    $teacher2=$request->Teach2;
    $subject3=$request->Subject3;
    $teacher3=$request->Teach3;
    $subject4=$request->Subject4;
    $teacher4=$request->Teach4;

    $studentdata1=student::find($id);
    
    $studentdata1->fname=$firstname;
    $studentdata1->lname= $lastname;
    $studentdata1->address=$address;
    $studentdata1->email=$email;
    $studentdata1->mobile=$tp;
    $studentdata1->DOB=$dob;
    $studentdata1->year=$year;
    $studentdata1->status=$status;
    $studentdata1->Subject1=$subject1;
    $studentdata1->teacher1=$teacher1;
    $studentdata1->Subject2=$subject2;
    $studentdata1->teacher2=$teacher2;
    $studentdata1->Subject3=$subject3;
    $studentdata1->teacher3=$teacher3;
    $studentdata1->Subject4=$subject4;
    $studentdata1->teacher4=$teacher4;


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
        $dataArray['subject1']=$subject1;
        $dataArray['teacher1']=$teacher1;
        $dataArray['subject2']=$subject2; 
        $dataArray['teacher2']=$teacher2;
        $dataArray['subject3']=$subject3;
        $dataArray['teacher3']=$teacher3;
        $dataArray['subject4']=$subject4;
        $dataArray['teacher4']=$teacher4;

        array_push($rowsArray, $dataArray);

    }

    return view('StudentManagemt.StudentProfile',['rowsArray'=>$rowsArray,'id'=>$id]);

}

public function viewprofile($id){

    $rowsArray=array();

    $student=student::where('id', '=', $id)->first();

    $firstname=$student->fname;
    $lastname=$student->lname;
    $address=$student->address;
    $email=$student->email;
    $tp=$student->mobile;
    $dob=$student->DOB;
    $year=$student->year;
    $status=$student->status;
    $subject1=$student->subject1;
    $teacher1=$student->teacher1;
    $subject2=$student->subject2;
    $teacher2=$student->teacher2;
    $subject3=$student->subject3;
    $teacher3=$student->teacher3;
    $subject4=$student->subject4;
    $teacher4=$student->teacher4;

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
            $dataArray['subject1']=$subject1;
            $dataArray['teacher1']=$teacher1;
            $dataArray['subject2']=$subject2; 
            $dataArray['teacher2']=$teacher2;
            $dataArray['subject3']=$subject3;
            $dataArray['teacher3']=$teacher3;
            $dataArray['subject4']=$subject4;
            $dataArray['teacher4']=$teacher4;

            array_push($rowsArray, $dataArray);

    break;
    }

    return view('StudentManagemt.StudentProfile',['rowsArray'=>$rowsArray]);

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
    $subject1=$student->subject1;
    $teacher1=$student->teacher1;
    $subject2=$student->subject2;
    $teacher2=$student->teacher2;
    $subject3=$student->subject3;
    $teacher3=$student->teacher3;
    $subject4=$student->subject4;
    $teacher4=$student->teacher4;

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
            $dataArray['subject1']=$subject1;
            $dataArray['teacher1']=$teacher1;
            $dataArray['subject2']=$subject2; 
            $dataArray['teacher2']=$teacher2;
            $dataArray['subject3']=$subject3;
            $dataArray['teacher3']=$teacher3;
            $dataArray['subject4']=$subject4;
            $dataArray['teacher4']=$teacher4;

            array_push($rowsArray, $dataArray);

    break;
    }

    return view('StudentManagemt.Del_Stu_Profile',['rowsArray'=>$rowsArray]);

}


public function recoverData(Request $request){

    $studenRec= new student;

    $student=StudentDel::where('id', '=', $request->st_id)->first();
    
    $student->delete();

    $studenRec->fname=$student->firstname;
    $studenRec->lname=$student->lastname;
    $studenRec->address=$student->address;
    $studenRec->email=$student->email;
    $studenRec->mobile=$student->telephone;
    $studenRec->DOB=$student->DOB;
    $studenRec->year=$student->year;
    $studenRec->status=$student->status;
    $studenRec->subject1=$student->subject1;
    $studenRec->teacher1=$student->teacher1;
    $studenRec->subject2=$student->subject2;
    $studenRec->teacher2=$student->teacher2;
    $studenRec->subject3=$student->subject3;
    $studenRec->teacher3=$student->teacher3;
    $studenRec->subject4=$student->subject4;
    $studenRec->teacher4=$student->teacher4;

    $studenRec->save();
    

    return view('StudentManagemt.student_Management_index')->with('status',2);


}



}














