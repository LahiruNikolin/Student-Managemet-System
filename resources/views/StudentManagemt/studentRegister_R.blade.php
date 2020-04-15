@extends('welcome')

 
@section('content')

  <link rel="stylesheet" href="CSS/stu_reg.css">

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
  
    <label for="fname">First Name______________________________</label>
      <input type="text" id="fname" name="firstname" placeholder="Your name..">

      <label for="lname">Last Name_____________________________</label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name..">

      <label for="add">Address_________________________________</label>
      <input type="text" id="add" name="address" placeholder="Your address..">

      <label for="ema">Email___________________________________</label>
      <input type="text" id="ema" name="email" placeholder="Your email">

      <label for="tp">Tel. Number____________________________</label>
      <input type="text" id="tp" name="telephone" placeholder="Your telephone number..">

      <label for="tp">Date of Birth____________________________</label>
      <input type="text" id="DOB" name="birthday" placeholder="Your birthday..">
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