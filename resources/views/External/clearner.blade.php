@extends('welcome')

 
@section('content')
<title>EMPLOYEE DETAILS</title>


<style>
body{
	background:url(background/employeeDetail.jpg);
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('success'))
      <script>
    function myFunction() {
      swal({
        title: "Good job!",
        text: "Successfully",
        icon: "success",
        button: "OK!",
      });
    }
    </script>
@endif
 <div class="wrap">
 	<h2>CLEARNER DETAILS</h2>



      <button type="button" onclick="window.location.href = 'add-clearner';">ADD CLEARNER</button>

			<button type="button" onclick="window.location.href = 'remove-list?type=cleaner';">REMOVE LIST</button>

			<?php
        $emp = DB::table('cleaner')->where('status','1')->get();
      ?>
			<table style="width:100%">
				@foreach($emp as $emp)
				<tr>
					<td width="60%">
						<button type="button" onclick="window.location.href = 'employee-detalis?id={{ $emp->id }}&type=cleaner&atd=clearner_attendence';" style="display: inline;">{{ $emp->name }}</button>
					</td>
					<td>
						<button type="button" onclick="window.location.href = 'removeCleanList?id={{ $emp->id }}';" style="display: inline; background:#f95858;">Remove</button>
					</td>
				</tr>
				@endforeach
			</table>








</div>
</body>
@stop
