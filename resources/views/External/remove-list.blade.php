<?php
$type=$_GET['type'];

$emp = DB::table($type)->where('status','0')->get();

?>
<html>
<head>
<title>Remove List</title>
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

button{

width: 60%;
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
border-radius: 8px;
}
h2{
text-align: center;
}
h4{
  font-size: 30px;
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
</style>
 <div class="wrap">

	<form>
  
   <center><h4>REMOVE LIST</h4></center>
   <center>
      <table border="3">
  <tr>
     <th><h1>DATE</h1></th>
     <th><h1>NAME</h1></th>
  <tr>
    @foreach($emp as $emp)
      <tr>
         <td>2020/1/2</td>
         <td>{{ $emp->name }}</td>
      </tr>
    @endforeach

</table>
<button type="button" class="button" style="background-color:#555555;" onclick="window.print()" style="display: inline; background:#f95858;">Download Remove List</button>

</center>
    </form>

</div>

</body>
</html>
