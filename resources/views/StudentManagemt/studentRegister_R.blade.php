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



    
  <form method="post" action="{{action('RStudentController@store') }}">
  {{csrf_field()}}
  
    <label for="fname">First Name_______________________________________</label>
      <input type="text" id="fname" name="firstname" placeholder="Your name..">

      <label for="lname">Last Name_______________________________________</label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">

      <label for="add">Address___________________________________________</label>
      <input type="text" id="add" name="address" placeholder="Your address..">

      <label for="ema">Email_____________________________________________</label>
      <input type="text" id="ema" name="email" placeholder="Your email">

      <label for="tp">Tel. Number______________________________________</label>
      <input type="text" id="tp" name="telephone" placeholder="Your telephone number..">

      <label for="dob">Date of Birth______________________________________</label>
      <input type="text" id="DOB" name="birthday" placeholder="Your birthday..">

      
     

      <label for="yr">Year______________________________________</label>
      <input type="text" id="yr" name="year" placeholder="year..">
  
  
    <input type="submit" value="Submit">
  </form></div></center>
</div>
@stop