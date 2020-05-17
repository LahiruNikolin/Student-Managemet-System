@extends('welcome')

 
@section('content')

 <style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #454d55;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #212529;
}

.form_1 {
  width: 40%;
  border-radius: 5px;
  background-color: #7c848a ;
  padding: 20px;
}

.page_1{
  width: 100%;
  border-radius: 5px;
  padding: 20px;

}
.page_2{
  margin: auto;
  border-radius: 5px;
  padding: 20px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}


 </style>

<div class="page_1"><center>
  <h2>Student Registration Form</h2>
    
  <div class="form_1">

      @foreach($errors->all() as $error)

      <div class="alert alert-danger" role="alert">
          {{$error}}

      </div>

      @endforeach

      <form id='prof' action="{{action('RStudentController@retriveProfile') }}" method="post" >
      {{ csrf_field() }}
      @foreach($rowsArray as $rowsArray)
      <input type="hidden" name="email" value="{{$rowsArray['email']}}">
      <input type="hidden" name="Sid" value="{{$rowsArray['id']}}">
      
      @endforeach

  @foreach($classArray as $studentTeacher)
    
      <label for="yr">Year___________________________________________________</label>
      <input type="text" id="year" name="year" placeholder="year.." value="{{$studentTeacher['year']}}">
      <input type="hidden" name="Cid" value="{{$studentTeacher['Cid']}}">
  @foreach($classArray2 as $studentSubject)
  
  <table>
    <tr>
      <th>SUBJECT</th>  
      <th>TEACHER</th>
    
    </tr>
    @for($i=0; $i < count($studentTeacher); $i++)
      <tr>
        <td>
        
        <input type="text" name="subject" value="{{$studentSubject['subName']}}">
        
       
        </td>
        
        <td>
          
            {{$studentTeacher['Tname']}} 
          
            <input type="checkbox" name="t1"value="{{$studentTeacher['Tname']}}" >
            <input type="hidden" id="teacher" name="subject"value="{{$studentTeacher['Tname']}}">
          
        </td>
        </tr>
    @endfor

  </table>

  @endforeach
  @endforeach

 <input type="submit" value="Submit">
  </form>
  
    </div></center>
</div>
@stop