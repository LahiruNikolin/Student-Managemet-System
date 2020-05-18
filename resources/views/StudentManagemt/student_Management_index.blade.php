@extends('welcome')

 
@section('content')


  <style>

body {
 
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}


#profile1{
  border-radius: 25px 25px 25px 25px;
  background-color: #454d55;
  height: 390px;
  width: 870px;
  margin: 80px 0px 0px 150px;
   
  display:flex;
  justify-content:center;
  font-size: 20px;
}
#profile1 button{
      width:17rem;
}

</style>


<body><br/><br/>

<div id="profile3">

@switch($status)
    @case(1)
    <div class="alert alert-warning scanFD" role="alert">
        <span>Student has been deleted!</span> 
        <span><i class="fas fa-exclamation-triangle"></i></span>
    </div>

    @break

    @case(2)
    <div class="alert alert-warning scanFD" role="alert">
        <span>Student has been recoverd!</span> 
    </div>
    @break
    @default

@endswitch

<center><h3>STUDENT MANAGEMENT</h3></center>
      

  			<div id="profile1"></br></br>

      		<button class="btn" ><a  style="width:100%;" class="btn btn-cust btn-lg btn-primary float-right" href="./studentregister">Add a Student</a></button><br/><br/>

      		<button class="btn"><a  style="width:100%;" class="btn btn-cust btn-lg btn-primary float-right" href="./allStudentsDetails">All Students Details</a></button><br/><br/>
      		
      		<button class="btn"><a  style="width:100%;" class="btn btn-cust btn-lg btn-primary float-right" href="./deletedStudentsDetails">Delete Students Details</a></button>
            

            </div>

</br>
</div>
@stop