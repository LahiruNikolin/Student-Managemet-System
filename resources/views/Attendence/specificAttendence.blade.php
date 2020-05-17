@extends('welcome')

 
@section('content')

<div style="position:relative;" >
   
    <div   style="  margin:auto;">
        <div class="text-muted font-italic pt-3 " style="text-align:right; 
        font-size:1.3rem;  padding-right:5.3rem;">
            <p id="stamp">{{$year." ". $month}} </p>
        </div>

        <div style="position:absolute; top:0.4rem; right:0;">
            <button  onclick="printCanvas()" type="button" 
            class="btn btn-primary mt-2">Print</button>
        </div>

        <div style="position:absolute; top:0.4rem; left:0;">
            <button  onclick="location.href='{{url('viewAttendence')}}';" type="button" 
            class="btn btn-dark mt-2">Back</button>
        </div>
     
        <canvas   id="Chart1" width="1000" height="500"></canvas>
   
    </div>
     
</div>

<script>
let stamp=document.querySelector('#stamp').textContent;
 
function printCanvas(){
    
 
            printJS({printable: document.querySelector("#Chart1").toDataURL(), 
            type: 'image',
            header:stamp, 
            imageStyle: 'width:100%'});
        }
       
      
        
   


 


function loadDefaultChart(){
let months=[];
let attens=[];

loadJSON('../storage/app/public/json/specificAttendence.json',
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


</script>
@stop