@extends('welcome')

 
@section('content')


<style>
    table {
    border-collapse: collapse;
    width: 100%;
    }

    td, {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }

    .bar {
  margin: 3px 0px 0px 0px;
  width: auto;
  height: 50px;
  padding: 8px 10px;
  overflow: hidden;
  background-color: rgb(47, 128, 83);
  font-family: Arial, Helvetica, sans-serif;
}

h3{

font-family : 	'Comic Sans MS';


}

  </style>

</head>

<body>
</br>
        <h3><center>All Students Details</center></h3>
            <br/><br/>

<div class="bar">

<input type="text" id="search" name="search" placeholder="Search here..">
<button type="submit"><i class="fa fa-search"></i></button>

</div> </br></br>
  
            <div id="profile"><CENTER>
            
            
            <table border="1">
    	
            <tr>
      		
            <th>FirstName</th>
            <th>Address</th>
            <th>email</th>
            <th>Tel. Number</th>
            <th>Date of Birth</th>
            <th>Subject</th>
            <th>Teacher</th>
            <th>Subject</th>
            <th>Teacher</th>
            <th>Subject</th>
            <th>Teacher</th>
            <th>Subject</th>
            <th>Teacher</th>

            </tr>
 
            @foreach($StudentsData as $studentdata)
 
    	    <tr>
            
            <td>{{$studentdata->firstname}} {{$studentdata->lastname}}</td>
            <td>{{$studentdata->address}}</td>
            <td>{{$studentdata->email}}</td>
            <td>{{$studentdata->telephone}}</td>
            <td>{{$studentdata->DOB}}</td>
    		    <td>{{$studentdata->subject1}}</td>
    		    <td>{{$studentdata->teacher1}}</td>
    		    <td>{{$studentdata->subject2}}</td>
    		    <td>{{$studentdata->teacher2}}</td>    
    	      <td>{{$studentdata->subject3}}</td>
    		    <td>{{$studentdata->teacher3}}</td>
    		    <td>{{$studentdata->subject4}}</td>
    		    <td>{{$studentdata->teacher4}}</td>
            
            </tr>

            @endforeach


	  </table></CENTER>

	</div>

@stop