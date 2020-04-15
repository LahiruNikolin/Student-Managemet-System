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
        <h3><center>Deleted Students Details</center></h3>
            
        <br/><br/>
            
            <div class="bar">

            <input type="text" id="search" name="search" placeholder="Search here..">
            <button type="submit"><i class="fa fa-search"></i></button>

            </div>   </br></br>         

            
            <div id="profile"><CENTER>
            
            
            <table border="1">
    	
            <tr>
      		
            <th>FullName</th>
            <th>Address</th>
            <th>Email</th>
            <th>Tel. Number</th>
            <th>Date of Birth</th>
            <th>Subject1</th>
            <th>Teacher1</th>
            <th>Subject2</th>
            <th>Teacher2</th>
            <th>Subject3</th>
            <th>Teacher3</th>
            <th>Subject4</th>
            <th>Teacher4</th>
            <th>Action</th>

            </tr>
 
            @foreach($DeleteData as $Deletestudentdata)
 
    	    <tr>
            
            <td>{{$Deletestudentdata->firstname}} {{$Deletestudentdata->lastname}}</td>
            <td>{{$Deletestudentdata->address}}</td>
            <td>{{$Deletestudentdata->email}}</td>
            <td>{{$Deletestudentdata->telephone}}</td>
            <td>{{$Deletestudentdata->DOB}}</td>
    		    <td>{{$Deletestudentdata->subject1}}</td>
    		    <td>{{$Deletestudentdata->teacher1}}</td>
    		    <td>{{$Deletestudentdata->subject2}}</td>
    		    <td>{{$Deletestudentdata->teacher2}}</td>    
    	      <td>{{$Deletestudentdata->subject3}}</td>
    		    <td>{{$Deletestudentdata->teacher3}}</td>
    		    <td>{{$Deletestudentdata->subject4}}</td>
            <td>{{$Deletestudentdata->teacher4}}</td>
            <td><button class="btn btn-warning">Recover</button></td>
            
            </tr>

            @endforeach


	  </table></CENTER>

	</div>

 

  @stop