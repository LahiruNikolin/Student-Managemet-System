@extends('welcome')

 
@section('content')
  <title>STAFF MANAGMENT</title>
<link rel="stylesheet" type="text/css" href="style.css">


<style>
body{
	background:url(background/staffManagementHom.jpg);
	background-size: cover;
	font-family: verdana;
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
  
}

h2{

text-align: center;
}
button{
	width: 100%;
	box-sizing: border-box;
	padding: 12px 5px;
	background:rgba(0,0,0,0.10);
	outline: none;
	border: none;
	border-bottom: 1px dotted #fff;
	color: #fff;
	border-radius: 5px;
	margin: 5px;
	font-weight: bold;
}

button{

	width: 100%;
	box-sizing: border-box;
	padding: 10px 0;
	margin-top: 30px;
	outline: none;
	border: none;
	background:#60adde;
	opacity:0.7;
	border-radius: =20px;
	font-size: 20px;
	color: #fff;
}

button:hover{
	background:#003366;
	opacity: 0.7;
}

</style>
<body>

 <div class="wrap">
 	<h2>STAFF MANAGMENT</h2>

 	<form>


        <button type="button" onclick="window.location.href = 'reciptionist';">RECEPTTIONIST</button>

        <button type="button" onclick="window.location.href = 'employeeDetails';">SECURITY</button>

        <button type="button" onclick="window.location.href = 'clearner';">CLEARNER</button>


    </form>

</div>
@stop