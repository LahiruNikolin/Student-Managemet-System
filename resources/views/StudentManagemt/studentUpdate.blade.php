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
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.form_1 {
  width: 30%;
  border-radius: 5px;
  background-color: #7a7597;
  padding: 20px;
}
h2{
  font-family: "Comic Sans MS", cursive, sans-serif;
}
.page_1{
  width: 100%;
  border-radius: 5px;
  padding: 20px;
  background-image:url('/images/book1.jpg');
}
.page_2{
  margin: auto;
  border-radius: 5px;
  background-color: #c8c3cc;
  padding: 20px;
  background-image: url('public/student2.jpg');
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
</head>
<body>
<div class="page_2"><center>
  
  <h2>Update Student Profile </h2>
  
  <div class="form_1">
  @foreach($errors->all() as $error)

<div class="alert alert-danger" role="alert">
    {{$error}}

</div>

@endforeach

    <form action="updatetask" method="post">
    {{ csrf_field() }}

      <label for="fname">First Name_____________________________________________</label>
      <input type="text" id="fname" name="firstname" value="{{$stuUpdate['firstname']}}">
      <input type="hidden" name="id" value="{{$stuUpdate['id']}}">

      <label for="lname">Last Name_______________________________________________</label>
      <input type="text" id="lname" name="lastname" value="{{$stuUpdate['lastname']}}">

      <label for="add">Address________________________________________________</label>
      <input type="text" id="add" name="address" value="{{$stuUpdate['address']}}">

      <label for="ema">Email_________________________________________________</label>
      <input type="text" id="ema" name="email" value="{{$stuUpdate['email']}}">

      <label for="tp">Tel. Number____________________________________________</label>
      <input type="text" id="tp" name="telephone" value="{{$stuUpdate['telephone']}}">

      <label for="tp">Date of Birth____________________________________________</label>
      <input type="text" id="DOB" name="birthday" value="{{$stuUpdate['DOB']}}">
      
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
    <input type="submit" value="Update"/>
  </form></div></center>
</div>
@stop