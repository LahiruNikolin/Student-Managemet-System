<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentReg;
use App\StudentDel;

class RStudentController extends Controller
{
    public function store(Request $request){

        $StudentReg = new StudentReg; 

        
        
        $rowsArray=array();

 
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=> 'required',
            'address'=>'required',
            'email'=>'required|email',
            'telephone'=>'required',
            'birthday'=>'required|date',
            

        ]);
         

        $firstname=$StudentReg->firstname=$request->input('firstname');
        $lastname=$StudentReg->lastname=$request->input('lastname');
        $address=$StudentReg->address=$request->input('address');
        $email=$StudentReg->email=$request->input('email');
        $tp=$StudentReg->telephone=$request->input('telephone');
        $dob=$StudentReg->DOB=$request->input('birthday');
        $subject1=$StudentReg->subject1=$request->input('Subject1');
        $teacher1=$StudentReg->teacher1=$request->input('Teach1');
        $subject2=$StudentReg->subject2=$request->input('Subject2');
        $teacher2=$StudentReg->teacher2=$request->input('Teach2');
        $subject3=$StudentReg->subject3=$request->input('Subject3');
        $teacher3=$StudentReg->teacher3=$request->input('Teach3');
        $subject4=$StudentReg->subject4=$request->input('Subject4');
        $teacher4=$StudentReg->teacher4=$request->input('Teach4');
        $StudentReg->save();

        $alldata= StudentReg::where('email', '=', $email)->get();
        
        foreach ($alldata as $data){
            
            $dataArray = array();
        
            $data=StudentReg::where(['email'=> $email])->orderBy('created_at', 'desc')->first();
            $dataArray['id']= $data->id;
            $dataArray['fullname']= $firstname." ".$lastname;
            $dataArray['address']=$address;
            $dataArray['email']=$email;
            $dataArray['telephone']=$tp;
            $dataArray['DOB']=$dob;
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


        }

        

        return view('StudentManagemt.StudentProfile',['rowsArray'=>$rowsArray,'email'=>$email]);

        }

    
    
    public function retriveTable(){

       $data2=StudentReg::all();
       
       return view('StudentManagemt.allStudentsDetails')->with('StudentsData',$data2);


    }
    public function DelretriveTable(){
        
        $deleteData=StudentDel::all();
 
        return view('StudentManagemt.deleted_students')->with('DeleteData',$deleteData);
 
     }


public function searchDetails(Request $request){

        $s=$request->input('s');

        $StudentReg = StudentReg::latest()->paginate(20);

        return veiw('StudentManagemt.allStudentsDetails',compact($StudentReg));


}

public function test(Request $request){

   // $StudentDel = new StudentDel;

    $studentdata=StudentReg::find($request->st_id);
/*
    $StudentDel->firstname=$request->firstname;
    $StudentDel->lastname=$request->lastname;
    $StudentDel->address=$request->address;
    $StudentDel->email=$request->email;
    $StudentDel->telephone=$request->telephone;
    $StudentDel->DOB=$request->birthday;
    $StudentDel->subject1=$request->Subject1;
    $StudentDel->teacher1=$request->Teach1;
    $StudentDel->subject2=$request->Subject2;
    $StudentDel->teacher2=$request->Teach2;
    $StudentDel->subject3=$request->Subject3;
    $StudentDel->teacher3=$request->Teach3;
    $StudentDel->subject4=$request->Subject4;
    $StudentDel->teacher4=$request->Teach4;
    $StudentDel->save(); */

    $studentdata->delete();

    return view('StudentManagemt.student_Management_index')->with('status',1);

        
  }


public function testupdate(Request $request){

            
    $studentdata=StudentReg::find($request->st_id);
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
            'birthday'=>'required|date',
            

        ]);

    $id=$request->id;
    $firstname=$request->firstname;
    $lastname=$request->lastname;
    $address=$request->address;
    $email=$request->email;
    $tp=$request->telephone;
    $dob=$request->birthday;
    $subject1=$request->Subject1;
    $teacher1=$request->Teach1;
    $subject2=$request->Subject2;
    $teacher2=$request->Teach2;
    $subject3=$request->Subject3;
    $teacher3=$request->Teach3;
    $subject4=$request->Subject4;
    $teacher4=$request->Teach4;

    $studentdata1=StudentReg::find($id);
    
    $studentdata1->firstname=$firstname;
    $studentdata1->lastname= $lastname;
    $studentdata1->address=$address;
    $studentdata1->email=$email;
    $studentdata1->telephone=$tp;
    $studentdata1->DOB=$dob;
    $studentdata1->Subject1=$subject1;
    $studentdata1->teacher1=$teacher1;
    $studentdata1->Subject2=$subject2;
    $studentdata1->teacher2=$teacher2;
    $studentdata1->Subject3=$subject3;
    $studentdata1->teacher3=$teacher3;
    $studentdata1->Subject4=$subject4;
    $studentdata1->teacher4=$teacher4;


    $studentdata1->save();


    
    $alldata= StudentReg::where('id', '=', $id)->get();
        
    foreach ($alldata as $data){
        
        $dataArray = array();
    
        $data=StudentReg::where(['id'=> $id])->orderBy('created_at', 'desc')->first();
        $dataArray['id']= $data->id;
        $dataArray['fullname']= $firstname." ".$lastname;
        $dataArray['address']=$address;
        $dataArray['email']=$email;
        $dataArray['telephone']=$tp;
        $dataArray['DOB']=$dob;
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


}














