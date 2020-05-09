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

            </tr>

            @endforeach



	  </table></CENTER>

	</div>
</body>
</html>