@extends('PaymentExpenses.mainLayout')

 
@section('styles')

<meta name="viewport" content="width=device-width, initial-scale=1">
     
<style>

body{
  font-family: sans-serif;
}

p{
  font-family: sans-serif;
  font-size: 20px;
  color: #424242;
}

h2{
  font-family: sans-serif;
  font-size: 35px;
  color: white;
}
*{
  box-sizing: border-box;
}

#btn1{
  background-color: #008be8;
  color: white;
  padding: 6px 15px;
  border: none;
  cursor: pointer;
  border-radius: 10px;
  float: right;
}

#btn1:hover{
  background-color:#089cff;
}

#container{
  height: auto;
  width: auto;
  background-color:  #f0f4f5;
  padding: 50px;
  margin-top: 50px;
  margin-left: 100px;
  margin-right: 50px;
  border: 1px solid;
  border-color: grey;
  
}

#row:after{
  content: "";
  display: table;
  clear: both;
}

#div1{
  padding: 15px 25px;
  width: auto;
  height: 5rem;
  background-color: #1aa3ff;
  text-align: center;
  color: white;
  margin-bottom: 100px;
  margin-left: none;
  margin-right: none;
}
#btn3{
  background-color: black;
  color: white;
  padding: 6px 15px;
  border: none;
  cursor: pointer;
  border-radius: 10px;
  float: left;
  margin-top: 10px;
}
#btndiv{
  margin-top:10px; 
}
#btndiv2{
  margin-left: 10px;
  float: right;
  padding-left: 150px;
  padding-bottom: 8px;
}
#FT{
  display: inline;
}

@media screen and (max-width: 600px){
    .column, input[type=submit]{
    width: 100%;
    margin-top: 0;
  }
}
</style>
@stop
    
@section('content')

  <div id="div1">
   <div style="text-align:center">
     <h2>Expenses Report</h2>
   </div>
  </div>

<div id="container">

  <div id="row">

      <form action="exReport" method="get" class="form-group">
        @csrf
        <div id="FT">
        
          
           <label for="Amount">From:</label>
           <input type="date" id="from" name="from"  required>
         
        
        
           <label for="Amount" >To:</label>
           <input type="date" id="to" name="to"  required>
          
      

        <div id="btndiv2">
          <button type="submit"  id="btn1">Generate</button>
        </div>
      </div>

        <div id="btndiv">
          <button  onclick="location.href='{{url('home')}}';" type="button" class="btn btn-dark " id="btn3"  >Back</button>
        </div>

      </form>

  </div>
</div>


@stop
