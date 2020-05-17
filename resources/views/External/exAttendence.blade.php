<?php
$id=$_GET['id'];
$atd=$_GET['atd'];
$emp = DB::table($atd)->where('id',$id)->orderBy('created_at', 'desc')->get();
$total=0;
?>
<html>
<head>
<title>EMPLOYEE Attendence</title>
</head>
</body>
<style>
body{
	background:url(background/back.jpg);
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
h4{
  font-size: 35px;
  font-family: verdana;
  color: #fff;

}

h1
{
  c  font-family: verdana;
  color: #fff;

}
td{
  font-family: verdana;
  color: #fff;
  font-size: 25px;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

button{

width: 65%;
box-sizing: border-box;
padding: 10px 0;
margin-top: 30px;
outline: none;
border: none;
background:#60adde;
opacity:0.7;
border-radius:=20px;
font-size: 20px;
color: #fff;
border-radius: 8px;

}

</style>
 <div class="wrap">

	<form>

   <center><h4>ATTENDANCE</h4></center>
   <center>
      <table border="2">
  <tr>
     <th><h1>Date</h1></th>
     <th><h1>Hours</h1></th>
  <tr>
    @foreach($emp as $emp)
      <tr>
         <td>{{ $emp->date }}</td>
         <td><center>{{ $emp->hours }}</center></td>
         @php 
          $total = $total + $emp->hours;
         @endphp
      </tr>
    @endforeach
    <tr>
      <td>Total Hours</td>
      <td><center><?php echo $total ?></center></td>
    </tr>


</table>
<button type="button" class="button" style="background-color:#555555;" onclick="window.print()" style="display: inline; background:#f95858;">Download Attendance Report</button>
</center>
    </form>

</div>

</body>
</html>
