@extends('welcome')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height:85vh;">
    <div class="card" style="width: 40rem; height:25rem; background-color:#f5f6fa;">
        <div class="card-body">
            <div style="background-color:#0984e3; color:white;" class="p-1">
                <h5 class="card-title">Excellent Institute</h5>
                <h6 class="card-subtitle mb-1 font-weight-normal">Class card</h6>
            </div>
            
            
            <div style="background-color:red;">
                <div class="text-left float-left">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Ravindu Shanthalal</li>
                        <li class="list-group-item">Chemistry,Physics</li>
                        <li class="list-group-item">077-3213660</li>
                        <li class="list-group-item">Fees Rs.800</li>
                      </ul>
                </div>
                <img src="{{asset('/imgs/student/student1.jpg')}}" height="170rem" alt="..." class="float-right">
                
            </div>
        </div>            
        <div class="card-footer   text-right">
            <a href="#" class="btn btn-success btn-lg">Print</a>
        </div>
    </div>
</div>
@stop