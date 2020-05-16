
@extends('welcome')

 
@section('content')
<?php
$id=$_GET['id'];
$type=$_GET['type'];
$atd=$_GET['atd'];

$emp = DB::table($type)->where('id',$id)->get();

?> 

<html>
<head>
  <title>EMPLOYEE Details</title>
 <style>
    body{
     background:url(imgs/ExStaff/user.png);
     image size: 480px;
    }

    .wrap{
  max-width:500px;
  border-radius: 20px;
  margin: auto;
  background:rgba(0,0,0,0.8);
  box-sizing: border-box;
  padding: 40px;
  color: #fff;
  margin-top: 100px;
  font-family: verdana;  
}
  h3{
    font-family: verdana;
  }
  .form1{
    max-width:250px; 
    border-radius: 8px;

  }

  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  width: 40%;
  border-radius: 10px;
}
button:hover{
	background:#003366;
	opacity: 0.7;
}


</style>

	<link rel="stylesheet" type="text/css" href="css/user.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Crete+Round|Indie+Flower|Playfair+Display+SC|Righteous" rel="stylesheet">

</head>
<body>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if(Session::has('success'))
        <script>
      function myFunction() {
        swal({
          title: "Good job!",
          text: "Working Hours Added",
          icon: "success",
          button: "OK!",
        });
      }
      </script>
  @endif

  <div class="wrap">
<center><div id="id10"><h3>EMPLOYEE DETAILS</h3></div></br></br>

<img src="{{asset('imgs/ExStaff/user.png')}}" alt="z" width="150" height="150"></br></br>

<form method="POST" action="addAttendence">

    {{ csrf_field() }}
@foreach($emp as $emp)
  <span>Name :</span>
  <span class="class30">{{ $emp->name }}</span></br></br>

  <span>Age :</span>
  <span class="class30">{{ $emp->age }}</span></br></br>

  <span>Date Of Birth :</label>
  <span class="class30">{{ $emp->dob }}</span></br></br>

  <span>Phone :</span>
  <span class="class30">{{ $emp->contactNumber }}</span></br></br>


  <span>Email :</span>
  <span class="class30">{{ $emp->email }}</span></br></br>

  <span>Address :</span>
  <span class="class30">{{ $emp->address }}</span></br></br>

  <span>Date :</span>
  <input type="date" id="date" class="form1" name="date" required>
  <br>
  <br></br>
  <span>Hours :</span>
  <input type="text" id="hours" class="form1" name="hours" ><br><br>
  </br>
  <input name="id" type="text" class="form1"  value="{{ $emp->id }}" hidden><br>
  <input name="type" type="text" class="form1"  value="<?php echo $atd; ?>" hidden><br>

  <input type="submit"  class="button" style="background-color:#555555;" value="Submitt"><br><br>
  @endforeach
</form>
<button type="button" class="button" style="background-color: #555555;" onclick="window.location.href = 'empattendence?id={{ $emp->id }}&atd=<?php echo $atd; ?>';" style="display: inline; background:#f95858;">Attendence</button>
</center>
</body>
</div>
@stop
