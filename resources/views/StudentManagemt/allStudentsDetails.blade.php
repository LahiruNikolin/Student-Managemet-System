@extends('welcome')

 
@section('content')


<style>
    table {
    border-collapse: collapse;
    width: 100%;
    }

    td, {
    border: 1px solid ;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #b2b8be;
    }

    .bar {
  margin: 3px 0px 0px 0px;
  width: auto;
  height: 50px;
  padding: 8px 10px;
  overflow: hidden;
  background-color: #454d55;
  font-family: Arial, Helvetica, sans-serif;
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
            <th>Profile</th>
            

            </tr>
 
            @foreach($StudentsData as $studentdata)
 
    	    <tr>
            
            <td>{{$studentdata->fname}} {{$studentdata->lname}}</td>
            <td>{{$studentdata->address}}</td>
            <td>{{$studentdata->email}}</td>
            <td>{{$studentdata->mobile}}</td>
            <td>{{$studentdata->DOB}}</td>
    		    
            <td><a href="./savetask/{{$studentdata->id}}"class="btn btn-success">View</a></td>

            </tr>

            @endforeach


	  </table></CENTER>

	</div>

@stop