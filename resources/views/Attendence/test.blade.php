@extends('welcome')

 
@section('content')
<!--
    <form method="POST"  action="./student">

        {{ csrf_field() }}

         <input type="hidden" name="_method" value="put">  

    <div class="form-group">
      <label for="fname">First Name</label>
      <input type="text" class="form-control" name="fname" id="fname" aria-describedby="emailHelp" placeholder="First Name">
       
    </div>
    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" name="lname" id="lname" aria-describedby="emailHelp" placeholder="Last Name">
        
      </div>
      <div class="form-group">
        <label for="year">A/L Year</label>
        <input type="email" class="form-control" id="year" aria-describedby="emailHelp" placeholder="Enter email">
         
      </div>
     
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  -->

<button onclick="fun()">Qr Code</button> 


<div id="qrcode"></div>


 
<script src="{{asset('js/qrcode.min.js')}}" ></script>

<script>

var qrcode = new QRCode(document.getElementById("qrcode"),{
    
    width: 128,
    height: 128,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});

function fun(){

    qrcode.makeCode("Hello World");
}
</script>
@stop