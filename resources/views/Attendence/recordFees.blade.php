@extends('welcome')

 
@section('content')



<div class="container mt-3" >
    <div class="d-flex flex-row-reverse ">

        <p class="font-weight-light text-lg-center pb-10 " 
        style="font-size:1.5rem; margin:auto;">Classes enrolled in</p>

        <button onclick="location.href='{{url('attendence')}}';" type="button" 
        class="btn btn-dark "  >Back</button>
    </div>
    <div style="height:1rem;  ">

    </div>
    
    <div class="mt-10" style="background-color:white;">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Class ID</th>
                <th scope="col">Subject</th>
                <th scope="col">Year</th>
                <th scope="col">Day/Time</th>
                <th scope="col">Last Payment</th>
                <th scope="col">Fee</th>
                <th scope="col" class="pl-4"  >Action</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($classesArray as $classArray)
                    
                
              <tr>
                <th scope="row" class="classID">{{$classArray['cid']}}</th>
              <td>{{ $classArray['subname']}}</td>
                <td>{{ $classArray['year']}}</td>
                <td>{{ $classArray['day_time']}}</td>
                <td>{{ $classArray['last_payment']}}</td>
                <td><span>Rs.</span><span class="feeVal">{{$classArray['fee']}}</span></td>
                <td>
                    <form action="">
                        <input type="checkbox"   
                          data-onstyle="success" data-offstyle="danger" 
                          data-on="Included" 
                          data-off="Removed"
                          data-toggle="toggle" 
                          class="toggler"
                          checked>
                    </form>
    
    
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <div  >
        <form class="form-inline float-right" method="POST" 
        action="{{action('attendencePageController@recordFees') }}" >
        {{ csrf_field() }}
            <div class="form-group">

                <input type="text" class="form-control" id="numOfIds" name="numOfIds" style="display:none;">
                <input type="text" class="form-control"  id="studentId" name="studentId" 
            style="display:none;" value="{{$sid}}">
               
              <div class="input-group input-group-lg ">  
                <input type="text" class="form-control" id="totAmount" placeholder="Amount" name="amount"
                 
                readonly> 
              </div>
            </div>
            <div class="classID-container" style="display:none;">

            </div>
            <button type="submit" class="btn btn-primary ml-1"  >Proceed</button>
        </form>
    </div>

</div>

<!--adding classids to form -->
<script>
         
 
    function updateForm(){
       let div =document.querySelector('.classID-container');

       let numOfClasses=document.querySelector('#numOfIds');
       let numOfIds=classIdsArray.length;
       let classPostFixID=1;
       numOfClasses.value=numOfIds;

       div.innerHTML="";
       classIdsArray.forEach((i)=>{
               let input=document.createElement("input");
               input.type = "text";
               input.value=i;
               input.name="class"+classPostFixID;
   
               div.appendChild(input); 
               classPostFixID++;
               
       });
    }
   
   </script>

<script>
 
    let totFees=0;

    let classIdsArray =Array();
  
     
    let feeTds=document.querySelectorAll('.feeVal');
    let classIds=document.querySelectorAll('.classID');
    let checkBoxes=document.querySelectorAll("Input[type='checkbox']");
    let sumField=document.querySelector('#totAmount');
    
    //console.log(sumField);
   
    feeTds.forEach(e=>{
        //console.log(e.textContent);
        totFees+=parseInt(e.textContent);
    });

    classIds.forEach((i)=>{
        
        //console.log(i.textContent);
        classIdsArray.push(i.textContent);
         
    });
    updateForm();

 
    sumField.value="Rs."+totFees;

    function updateTot(){
        sumField.value="Rs."+totFees;
    }

    function updateClassIds(id,op){
        if(op=="remove"){
            var index = classIdsArray.indexOf(id);
            if (index !== -1) classIdsArray.splice(index, 1);
           // showRay();
        }
        else{
            classIdsArray.push(id);
          //  showRay();
            
        }
        updateForm();
    }
     

    
    $(function() {
        //console.log($('.toggler')[0].checked=true);

        $.each( $('.toggler'), function( key, value ) {
            value.checked=true;
        });


        $('.toggler').change(function(e) {
        let checked=e.target.checked;
        let fee=e.target.parentNode.parentNode.parentNode.parentNode.childNodes[11].childNodes[1].textContent; 
        let id=e.target.parentNode.parentNode.parentNode.parentNode.childNodes[1].textContent;
        
         
        
        if(checked){ 
            totFees+=parseInt(fee);
            updateTot();
            updateClassIds(id,"add")
        }else{
            if(totFees>0){
            totFees-=parseInt(fee);
            updateTot();
            updateClassIds(id,"remove")
            }
        }

        console.log(totFees);

        })
  });

   // console.log(totFees);
</script>


@stop