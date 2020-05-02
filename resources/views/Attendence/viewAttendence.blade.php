@extends('welcome')

 
@section('content')
<?php
 $flag=false;
if (Session::has('futureDate'))
{
    Session::forget('futureDate');
     $flag=true;
}

?>
<div class="row">
    <div id="attendence" class="col-md-8"  style="  margin:auto;">
        <div  class="mt-3" >
            <form>
                <div class="form-group">
                    <select id="chart-toggle" class="form-control form-control-lg">
                        <option selected value="monthly"  >Recent Months</option>
                        <option  value="weekly" >Recent Days</option>
                         
                      </select>
                </div>
              </form>
            
        </div>
        <canvas style="display:none;" id="Chart1"   width="700" height="500"></canvas>
        <canvas style="display:none;" id="Chart2"   width="700" height="500"></canvas>
    </div>
    <div class="col-md-3">
        @if($flag)
            <div class="alert alert-danger scanFD mt-3" role="alert">
                <span>Can't select a future date!</span> 
                <span><i class="fas fa-exclamation-triangle"></i></span>
            </div>
        @endif
        <form method="POST" 
        action="{{action('attendencePageController@searchAttendence') }}" >
            {{ csrf_field() }}
             
            <div class="form-row pt-2">
              <div class="form-group col-md-12">
                <label for="inputState">Year</label>
                <select id="inputState" class="form-control" name='month' required>
                  
                  <option selected value='01'>January</option>
                  <option value='02'>February</option>
                  <option value='03'>March</option>
                  <option value='04'>April</option>
                  <option value='05'>May</option>
                  <option value='06'>June</option>
                  <option value='07'>July</option>
                  <option value='08'>August</option>
                  <option value='09'>September</option>
                  <option value='10'>October</option>
                  <option value='11'>November</option>
                  <option value='12'>December</option>
                </select>
              </div>
              <div class="form-group col-md-12">
                <label for="inputState">Month</label>
                <select id="inputState" class="form-control" name='year' required>
                    
                    @foreach ($years as $year)

                        <option value="{{$year}}"> {{$year}}</option>
                    @endforeach
                  
                  
                </select>
              </div>
              
            </div>
            <div style="  display:flex; justify-content:center;">
                <button type="submit" class="btn btn-primary" 
                style="width:100%;">View</button>
            </div>
            
          </form>

          <div class="mt-3" style=" display:flex; justify-content:center;">
            <button href="#" class="btn btn-primary" onclick="  printCanvas()"
            style="width:100%;">Print</button>
        </div>

    </div>
    
</div>
<script>

function printCanvas(){
    

if(document.querySelector('#Chart1').style.display=="block"){
            printJS({printable: document.querySelector("#Chart1").toDataURL(), 
        type: 'image', 
        imageStyle: 'width:100%'});
    }
    else{
                printJS({printable: document.querySelector("#Chart2").toDataURL(), 
        type: 'image', 
        imageStyle: 'width:100%'});
    }
  
    
}


    document.querySelector('#chart-toggle').addEventListener('change',e=>{

        console.log("changng");
       if(e.target.value=='weekly'){

                //  console.log("weekly selected");
                let days=[];
                let vals=[];


        loadJSON('../storage/app/public/json/attendenceWeekly.json',
                    function(data) { 
                        
                        
                        data.forEach(el => {
                            //console.log(element);
            
                            for (let [key, value] of Object.entries(el)) {
                                // console.log(`${key}: ${value}`);
                                days.push(key);
                                vals.push(value);
                                    
                            }
            
            
                        });
                    // months.forEach(e=>console.log(e));
                    days.reverse();
                    vals.reverse();
                    populateChart2(days,vals);
                    
                    },
                    function(xhr) { console.error(xhr); }
            );
            
       }else{
           // console.log("monthly selected");

           loadDefaultChart();      
        
       }
        
        });

 function loadDefaultChart(){
        let months=[];
        let attens=[];

        loadJSON('../storage/app/public/json/attendence.json',
            function(data) { 
                
                
                data.forEach(el => {
                    //console.log(element);

                    for (let [key, value] of Object.entries(el)) {
                            //  console.log(`${key}: ${value}`);

                            months.push(key);
                            attens.push(value);


                    }


                });
            // months.forEach(e=>console.log(e));
            months.reverse();
            attens.reverse();
            populateChart(months,attens);
            
            },
            function(xhr) { console.error(xhr); }
    );

 }
       
                

     
    
    function loadJSON(path, success, error)
    {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function()
        {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    if (success)
                        success(JSON.parse(xhr.responseText));
                } else {
                    if (error)
                        error(xhr);
                }
            }
        };
        xhr.open("GET", path, true);
        xhr.send();         
    
    }

function populateChart(months,attens){

    document.getElementById('Chart1').style.display='block';
    document.getElementById('Chart2').style.display='none';

    var ctx = document.getElementById('Chart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:months,
            datasets: [{
                label: 'Attendence',
                data:attens ,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                    }
                }]
                
            },
            responsive: false
        }
    });

}

loadDefaultChart();


function populateChart2(months,attens){
    document.getElementById('Chart2').style.display='block';
    document.getElementById('Chart1').style.display='none';
    
var ctx = document.getElementById('Chart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:months,
        datasets: [{
            label: 'Attendence',
            data:attens ,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 1,
                }
            }]
            
        },
        responsive: false
    }
});

}

   
 </script>    

<script>

          
if(document.querySelector(".scanFD")!= null){

setTimeout(function(){  document.querySelector(".scanFD").style.display='none';  }, 3000);
}
</script>
 

</div>
@stop