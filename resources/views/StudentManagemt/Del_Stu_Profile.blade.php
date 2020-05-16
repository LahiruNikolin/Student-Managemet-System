@extends('welcome')

 
@section('content')

<style>
#img1 {
  border-radius: 25px;
  display: block;
  margin-left: auto;
  margin-right: auto;
}

#img2{
	margin: -50px 0px 0px 750px;
	height: 150px;
	width: 150px;
	border-radius: 50%;
	position: absolute;
}
.class1{

	font-weight: bold;
}

#profile1{
	border-radius: 0px 25px 0px 25px;
	background-color: #b2b8be;
	height: 500px;
	width: 900px;
	margin: 80px 0px 0px 100px;
	align-content: center;
	font-size: 20px;
}
#profile2{
	height: 300px;
	width: 500px;
	margin: 80px 0px 0px 330px;
}
#delStForm .btn{
  width: 100%;
  color: rgb(15, 15, 15);
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  background-color: gray;


}


.serbar {
  margin: 3px 0px 0px 100px;
  width: 900px;
  height: 30px;
  padding: 14px 16px;
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}


.serbar .cust-dropdown {
  float: left;
  overflow: hidden;
}

.serbar .cust-dropdown .cust-dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.serbar a:hover, .cust-dropdown:hover .cust-dropbtn {
  background-color: red;
}

.serbar .cust-dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.serbar .cust-dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.serbar .cust-dropdown-content a:hover {
  background-color: #ddd;
}

.serbar .cust-dropdown:hover .cust-dropdown-content {
  display: block;
}
table {
  border-collapse: collapse;
  width: 60%;
}

td, th {
  border: 1px solid #b2b8be;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #b2b8be;
}

</style>


<div class="hero-image">
  <img id="img1" src="{{asset('imgs/images/student.jpg')}}" width="900px" height="300px">
</div>

	<img id="img2" src="{{asset('imgs/images/stu.png')}}">
	
	@foreach($rowsArray as $studentdata)

<div class="serbar" style="  height:4rem;">
 
</div>
  			<div id="profile1">
  				
					<div id="profile2" align="justify">

  				</br></br>
	  
      		<span class="class1">Name:</span>
      		<span>{{$studentdata['fullname']}}</span></br></br>

      		<span class="class1">Address:</span>
      		<span>{{$studentdata['address']}}</span></br></br>

			<span class="class1">Email:</span>
      		<span>{{$studentdata['email']}}</span></br></br>
      		
      		<span class="class1">Tel. Number:</span>
      		<span>{{$studentdata['telephone']}}</span></br></br>

      		<span class="class1">Date of Birth:</span>
      		<span>{{$studentdata['DOB']}}</span></br></br>  

			<span class="class1">Year:</span>
      		<span>{{$studentdata['year']}}</span></br></br>

      		<span class="class1">status:</span>
      		<span>{{$studentdata['status']}}</span>

            </div>

            </div>

</br>

  <div id="profile"><CENTER>
  	<table border="1">
    	<tr>
      		<th>SUBJECT</th>
      		<th>TEACHER</th>
    	</tr>

    	<tr>
    		<td>{{$studentdata['subject1']}}</td>
    		<td>{{$studentdata['teacher1']}}</td>
    
    	</tr>
        
    	<tr>
    		<td>{{$studentdata['subject2']}}</td>
    		<td>{{$studentdata['teacher2']}}</td>
    	</tr>
    
    	<tr>
    		<td>{{$studentdata['subject3']}}</td>
    		<td>{{$studentdata['teacher3']}}</td>
    	</tr>
        
    	<tr>
    		<td>{{$studentdata['subject4']}}</td>
    		<td>{{$studentdata['teacher4']}}</td>
    	</tr>

	  </table></CENTER>

	  @endforeach

	  
	</div>

	@stop