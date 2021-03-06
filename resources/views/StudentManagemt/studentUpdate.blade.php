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
  background-color: #7c848a;
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

      <label for="fname">First Name________________________________________</label>
      <input type="text" id="fname" name="firstname" value="{{$stuUpdate['fname']}}">
      <input type="hidden" name="id" value="{{$stuUpdate['id']}}">

      <label for="lname">Last Name_________________________________________</label>
      <input type="text" id="lname" name="lastname" value="{{$stuUpdate['lname']}}">

      <label for="add">Address___________________________________________</label>
      <input type="text" id="add" name="address" value="{{$stuUpdate['address']}}">

      <label for="ema">Email_______________________________________________</label>
      <input type="text" id="ema" name="email" value="{{$stuUpdate['email']}}">

      <label for="tp">Tel. Number______________________________________</label>
      <input type="text" id="tp" name="telephone" value="{{$stuUpdate['mobile']}}">

      <label for="tp">Date of Birth______________________________________</label>
      <input type="text" id="DOB" name="birthday" value="{{$stuUpdate['DOB']}}">

      <label for="year">Year___________________________________________</label>
      <input type="text" id="year" name="year" value="{{$stuUpdate['year']}}">

       
      
      
      
@foreach($profileArray1 as $profileArray)
<input type="hidden" name="Cid" value="{{$profileArray['Cid']}}">
  <table>
    <tr>
      <th>SUBJECT</th>  
      <th>TEACHER</th>
    
    </tr>
      <tr>
        <td>
        <input type="text" id="status" name="subject" value="{{$profileArray['subName']}}">
    
        </td>
        
        <td>
        <input type="text" id="status" name="teacher" value="{{$profileArray['Tname']}}">
      
        </td>

  </tr>
  

  </table>
  @endforeach
    <input type="submit" value="Update"/>
  </form></div></center>
</div>
@stop