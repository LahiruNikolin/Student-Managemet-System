@extends('welcome')

 
@section('content')
<div class="row">
    <div class="col-md-6">
        <div  class="mt-3" >
            <form>
                <div class="form-group">
                    <select class="form-control form-control-lg">
                        <option>Monthly</option>
                        <option>Weekly</option>
                         
                      </select>
                </div>
              </form>
            
        </div>
        <canvas id="myChart" width="500" height="500"></canvas>
    </div>
    <div class="col-md-6">
        <div  class="mt-3" >
            <form>
                <div class="form-group">
                    <select class="form-control form-control-lg">
                        <option>Monthly</option>
                        <option>Weekly</option>
                         
                      </select>
                </div>
              </form>
            
        </div>
        <canvas id="myChart2" width="500" height="500"></canvas>
    </div>
</div>
    
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Nov', 'Dec', 'Jan', 'Feb', 'March', 'April'],
        datasets: [{
            label: 'Attendence',
            data: [12, 19, 3, 5, 2, 3],
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
                    beginAtZero: true
                }
            }]
        },
        responsive: false
    }
});


var ctx = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Nov', 'Dec', 'Jan', 'Feb', 'March', 'April'],
        datasets: [{
            label: 'Issued Cards',
            data: [12, 19, 3, 5, 2, 3],
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
                    beginAtZero: true
                }
            }]
        },
        responsive: false
    }
});
</script>
</div>
@stop