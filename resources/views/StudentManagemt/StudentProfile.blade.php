@extends('welcome')

 
@section('content')

<div class="hero-image">
  <img id="img1" src="images/student.jpg" width="900px" height="300px">
</div>

	<img id="img2" src="images/stu.png">
	
	@foreach($rowsArray as $studentdata)

<div class="bar">
  <div class="dropdown">
    <button class="dropbtn">More</button>
    <div class="dropdown-content">
		

		<form id='updatetForm' action="{{action('RStudentController@testupdate') }}" method="GET" >
		
		{{ csrf_field() }}

		<input type="hidden" name="st_id"  value="{{$studentdata['id']}}"></input>
		<button class="btn1" >Update Profile</button>	

		</form>

		<form id='delStForm' action="{{action('RStudentController@test') }}" method="POST" >

			{{ csrf_field() }}

			<input type="hidden" name="st_id"  value="{{$studentdata['id']}}"></input>
			<button class="btn" onclick="myFunction()" >Delete Profile</button>	

		</form>

	  	 

    </div>
  </div>
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
      		<span>{{$studentdata['DOB']}}</span>  

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