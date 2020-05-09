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
  <script >
	function myFunction1() {
    	var txt;
    	var r = confirm("do you want recover this account!");
		
		if (r == true) {
        	txt = "You chose OK!";

        	document.getElementById("recForm").submit(); 
	
		} else {
        	txt = "You Cancelled!";
    	}
	
		
}
</script>

</head>

<body>
</br>
        <h3><center>Deleted Students Details</center></h3>
            
        <br/><br/>
            
            <div class="bar">

            <form action="" method="GET">

            <input type="text" id="search" name="s" placeholder="Search here..">
            <button type="submit"><i class="fa fa-search"></i></button>

            <a href="./studentPrint" class="btn btn-success">print document</a>

            </form>
            </div>   </br></br>         

            
            <div id="profile"><CENTER>
            
            
            <table border="1">
    	
            <tr>
      		
            <th>FullName</th>
            <th>Address</th>
            <th>Email</th>
            <th>Tel. Number</th>
            <th>Date of Birth</th>
            <th>Profile</th>
            <th>Action</th>

            </tr>
 
            @foreach($DeleteData as $Deletestudentdata)
 
    	    <tr>
            
            <td>{{$Deletestudentdata->firstname}} {{$Deletestudentdata->lastname}}</td>
            <td>{{$Deletestudentdata->address}}</td>
            <td>{{$Deletestudentdata->email}}</td>
            <td>{{$Deletestudentdata->telephone}}</td>
            <td>{{$Deletestudentdata->DOB}}</td>

            <td><a href="./DelProfiles/{{$Deletestudentdata->id}}"class="btn btn-success">View</a></td>
            <td><form id='recForm' action="{{action('RStudentController@recoverData') }}" method="get" >

            {{ csrf_field() }}

            <input type="hidden" name="st_id"  value="{{$Deletestudentdata['id']}}"></input>
            <button class="btn btn-success" onclick="myFunction1()" >Recover</button>	

            </form></td>

            </tr>

            @endforeach



	  </table></CENTER>

	</div>

 

  @stop