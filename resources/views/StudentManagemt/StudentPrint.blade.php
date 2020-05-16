<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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


  </style>

<script>

var list = document.getElementsByClassName("personid");
for (var i = 1; i <= list.length; i++) {
    list[i].innerHTML = i;
}

function validate(){

var  myButton= document.getElementById('myButton');

                        setTimeout (function(){
                          myButton.style.display ='none';
                        },1);
                      setTimeout (function(){
                          window.print();
                        },1);
}

</script>

</head>

<body>
</br>
        <h3><center>Deleted Students Details</center></h3>
            
        <br/>
            
            <div class="bar" align="right">
          
            <input type="submit" class="btn btn-success" value="Print Document" onclick="validate();" id="myButton">
            
            </div>   </br>      

            
            <div id="profile"><CENTER>
            
            
            <table border="1">
    	
            <tr>
      		
            <th>no</th>
            <th>FullName</th>
            <th>Address</th>
            <th>Email</th>
            <th>Tel. Number</th>
            <th>Date of Birth</th>


            </tr>
 
            @foreach($DeleteData as $Deletestudentdata)
 
    	    <tr>
            
            <td class='personid'>i</td>
            
            <td>{{$Deletestudentdata->firstname}} {{$Deletestudentdata->lastname}}</td>
            <td>{{$Deletestudentdata->address}}</td>
            <td>{{$Deletestudentdata->email}}</td>
            <td>{{$Deletestudentdata->telephone}}</td>
            <td>{{$Deletestudentdata->DOB}}</td>


            </tr>

            @endforeach



	  </table></CENTER>

	</div>
</body>
</html>