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

      <label for="yr">Year______________________________________________</label>
      <input type="text" id="year" name="year" placeholder="year..">
      
      <label for="status">Status______________________________________</label>
      <select name="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
  
  
  <table>
    <tr>
      <th>SUBJECT</th>  
      <th>TEACHER</th>
    
    </tr>
      <tr>
        <td>
          <select name="Subject1">
            <option value="-">Select</option>
            <option value="sub1">sub 1</option>
            <option value="sub2">sub 2</option>
            <option value="sub3">sub 3</option>
            <option value="sub4">sub 4</option>
          </select>
        </td>
    
        <td>
          <select name="Teach1">
            <option value="-">Select</option>
            <option value="Teacher1">Teacher 1</option>
            <option value="Teacher2">Teacher 2</option>
            <option value="Teacher3">Teacher 3</option>
            <option value="Teacher4">Teacher 4</option>
          </select>
        </td>

  </tr>
  
  <tr>
        <td>
          <select name="Subject2">
            <option value="-">Select</option>
            <option value="sub1">sub 1</option>
            <option value="sub2">sub 2</option>
            <option value="sub3">sub 3</option>
            <option value="sub4">sub 4</option>
          </select>
        </td>

        <td>
          <select name="Teach2">
            <option value="-">Select</option>
            <option value="Teacher1">Teacher 1</option>
            <option value="Teacher2">Teacher 2</option>
            <option value="Teacher3">Teacher 3</option>
            <option value="Teacher4">Teacher 4</option>
          </select>
        </td>
  </tr>

  <tr>
        <td>
          <select name="Subject3">
            <option value="-">Select</option>
            <option value="sub1">sub 1</option>
            <option value="sub2">sub 2</option>
            <option value="sub3">sub 3</option>
            <option value="sub4">sub 4</option>
          </select>
        </td>
        <td>
          <select name="Teach3">
            <option value="-">Select</option>
            <option value="Teacher1">Teacher 1</option>
            <option value="Teacher2">Teacher 2</option>
            <option value="Teacher3">Teacher 3</option>
            <option value="Teacher4">Teacher 4</option>
          </select>
        </td>
  </tr>
        <tr>
        <td>
          <select name="Subject4">
            <option value="-">Select</option>
            <option value="sub1">sub 1</option>
            <option value="sub2">sub 2</option>
            <option value="sub3">sub 3</option>
            <option value="sub4">sub 4</option>
          </select>
        </td>
        
        <td>
          <select name="Teach4">
            <option value="-">Select</option>
            <option value="Teacher1">Teacher 1</option>
            <option value="Teacher2">Teacher 2</option>
            <option value="Teacher3">Teacher 3</option>
            <option value="Teacher4">Teacher 4</option>
          </select>
        </td>
  </tr>


  </table>
    <input type="submit" value="Submit">
  </form></div></center>
</div>
@stop