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
 <div class="alert alert-primary" role="alert" style="font-size:2rem;">
  <p class="text-center">Classes for {{$studentArray['year']}}</p>
</div>
 <div class="bg-primary p-2" style=" border-radius:5%;
  width:40rem; margin:auto; margin-top:8rem; font-size:1.4rem; color:white;" >

 <form method="POST"  action="{{action('RStudentController@retriveProfile') }}" >
 {{csrf_field()}}
  <fieldset class="form-group">
    <div class="row">
    <input style="display:none;" type="text" name="size" value='{{count($classArray)}}'>
    <input style="display:none;" type="text" name="email" value="{{ $studentArray['email']}}">  
    <input style="display:none;" type="text" name="sid" value="{{ $studentArray['id']}}">  
    </div>
  </fieldset>
  <?php $i=1; ?>
    @foreach($classArray as $class)
  <div class="form-group row">
   
 
    <div class="col-sm-2">{{$class['subName']}}</div>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1" 
        value="{{$class['classId']}}"
        name="class{{$i}}">
        <label class="form-check-label" for="gridCheck1">
        {{$class['teacherName']}}
        </label>
      </div>
     
    </div>
  </div>
  
  <?php $i++; ?>
  @endforeach
  
    <div class="col-sm-10">
      <button type="submit" class="mt-4 btn btn-primary float-right">Enroll</button>
    </div>
  </div>
</form>

  
 </div>

@stop