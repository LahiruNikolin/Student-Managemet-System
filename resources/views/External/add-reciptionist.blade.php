@extends('welcome')

 
@section('content')

  <title>Add EMPLOYEE</title>

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
body{
    margin:0;
    padding:0;
    text-align:center;
    background:url(background/s.jpg);
    background-size:cover;
    background-possition:center;
    font-family:sans-serif;
}

.wrap{
  max-width:700px;
  border-radius: 20px;
  margin: auto;
  background:rgba(0,0,0,0.8);
  box-sizing: border-box;
  padding: 40px;
  color: #fff;
  margin-top: 100px;
  font-family: verdana; 
  
}


  .cont{
    margin-top:100px;
    color:black;
    text-transform:uppercase;
    transition:all 4s else-in-out;
}
  .cont h1{
    font-size:32px;
    line-height:10px;
}
  .cont h2{
    font-size:16px;
}

  form{
    margin-top:50px;
    transition:  all 4s ease-in-out;
}
 .form1{
     width:600px;
     background:transparent;
     border:none;
     outline:none;
     border-bottom: 1px solid gray;
     color:white;
     font-size:18px;
     margin-bottom:16px;
}

 input{
   height:45px;
}

form.submit{
    background:red;
    border-color:transparent;
    color:white;
    font-size:20px;
    font-weight:bold;
    letter-spacing:2px;
    height:50px;
    margin-top:20px;
}
form.submit:hover{
    background-color:#f44336;
    cursor:pointer;
}

</style>

<body onload="myFunction()">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="cont">
    <div class="wrap">
      <h1>NEW RECEPTTIONIST</h1>

     <div class="contact-form">
       <form method="POST" action="addReci">

       {{ csrf_field() }}

           <input name="name" type"text" class="form1" placeholder="Name" required><br>

           <input name="age" type"text" class="form1" placeholder="Age" required><br>

           <input type="date" id="birthday" class="form1" name="birthday" required><br>

           <input name="contact" type"text" class="form1" placeholder="Contact" required><br>

           <input name="email" type"text" class="form1" placeholder="Email" required><br>

           <input name="address" type"text" class="form1" placeholder="Address" required><br>

        <input type="submit" class="form1 submit" value="ADD RECEPTTIONIST">

       </form>


    </div>


@if(Session::has('success'))
      <script>
    function myFunction() {
      swal({
        title: "Good job!",
        text: "New Employee Added Successfully",
        icon: "success",
        button: "OK!",
      });
    }
    </script>
@endif
</div>
</body>
@stop
