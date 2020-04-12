@extends('welcome')

 
@section('content')


  <style>

body {
  background-image:url('/images/book1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

h3{

  font-family : 	'Comic Sans MS';


}

#profile1{
  border-radius: 25px 25px 25px 25px;
  background-color: #dddddd;
  height: 370px;
  width: 870px;
  margin: 80px 0px 0px 325px;
  font-family: "Comic Sans MS", cursive, sans-serif;
  align-content: center;
  font-size: 20px;
}

</style>
</head>

<body><br/><br/><br/>

<div id="profile3">

@switch($status)
    @case(1)
    <div class="alert alert-warning scanFD" role="alert">
        <span>Student has been deleted!</span> 
        <span><i class="fas fa-exclamation-triangle"></i></span>
    </div>
        @break
 
    @default

@endswitch

<center><h3>STUDENT MANAGEMENT</h3></center>
      

  			<div id="profile1"></br></br>

      		<button class="btn" ><a  style="width:100%;" class="btn btn-cust btn-lg btn-primary float-right" href="./register">Add a Student</a></button><br/><br/>

      		<button class="btn"><a  style="width:100%;" class="btn btn-cust btn-lg btn-primary float-right" href="./allStudentsDetails">All Students Details</a></button><br/><br/>
      		
      		<button class="btn"><a  style="width:100%;" class="btn btn-cust btn-lg btn-primary float-right" href="/deletedStudentsDetails">Delete Students Details</a></button>
            

            </div>

</br>
</div>
@stop