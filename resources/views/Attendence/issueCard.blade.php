@extends('welcome')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height:85vh;" id="issueCardParent">
    
    <div class="spinner-grow text-primary" style="width:10rem; height:10rem;" role="status" id="loader">
        <span class="sr-only">Loading...</span>
    </div>
    <div     class="card" style="width: 40rem; height:18rem; background-color:#f5f6fa;" id="printJS-card" >
        <div class="card-body" style="width: 40rem; "  >
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
                <img src="{{asset('/imgs/student/qr1.png ')}}" height="170rem" alt="..." class="mt-2 float-right">
                
            </div>
        </div>            
      
    </div>

    <div class="card-footer   text-right" id='print-btn'>
             
        <button class="btn btn-success btn-lg" type="button" onclick="$('#printJS-card').printThis({
            
            importStyle: true,
        });">
            Print
         </button>

    </div>
</div>

 
<script>
      
    $('#printJS-card').hide();
    $('#print-btn').hide();
    setTimeout(function(){
    $('#loader').remove();
    $('#printJS-card').show();
    $('#print-btn').show();
}, 2000);
</script>
@stop