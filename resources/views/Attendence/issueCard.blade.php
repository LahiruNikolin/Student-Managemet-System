@extends('welcome')

@section('content')
<script type="text/javascript" src="{{asset('js/download.js')}}"></script>

<div class="d-flex justify-content-center align-items-center" style="height:85vh;" id="issueCardParent">
    
    <div class="spinner-grow text-primary" style="width:10rem; height:10rem;" role="status" id="loader">
        <span class="sr-only">Loading...</span>
    </div>
    <div  class="card" style="width: 35rem; height:18rem; background-color:#f5f6fa;" id="printJS-card" >
        <div class="card-body" style="width: 35rem; "  >
            <div style="background-color:#0984e3; color:white;" class="p-1">
                <h5 class="card-title">Excellent Institute</h5>
                <h6 class="card-subtitle mb-1 font-weight-normal">Class card</h6>
            </div>
            
            
            <div style="background-color:red;">
                <div class="text-left float-left">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$name}}</li>
                        <li class="list-group-item">
 <small>

                            @foreach ($subs as $sub)
                                    {{$sub}}
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                    
                                   
                            @endforeach
                        </small>
                        </li>
                        <li class="list-group-item">{{$mobile}}</li>
                        <li class="list-group-item">Fees Rs.{{$fee}}</li>
                      </ul>
                </div>
                <div id="qrcode" class="mt-2 float-right">
                
                </div>
                
            </div>
        </div>            
      
    </div>

    <div class="card-footer   text-right" id='print-btn'>
             
        <button class="btn btn-success btn-lg" type="button" onclick="$('#printJS-card').printThis({
            
            importStyle: true,
        });">
            Print
         </button>

         <button id="save_but" class="btn btn-success btn-lg" type="button"  >send
         
         </button>

    </div>
</div>

<span id="stuId"  style="display:none;">{{$id}}</span>

 
<script>
      
    $('#printJS-card').hide();
    $('#print-btn').hide();

    setTimeout(function(){
        $('#loader').remove();
        $('#printJS-card').show();
        $('#print-btn').show();
        fun();
        
    }, 1500);
</script>

 

<form id="movePicForm"  style="display:none;" method="POST"   action="{{action('attendencePageController@movePic') }}"  >
    {{csrf_field()}}
    
    <input type="text" name="email" id="email" value="{{$email}}"/>
    <button type="submit">submit</button>
    
</form>


 <!--generating qr code-->
<script src="{{asset('js/qrcode.min.js')}}" ></script>

<script>



var qrcode = new QRCode(document.getElementById("qrcode"),{
    
    width: 190,
    height: 190,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});

function fun(){
   console.log(document.querySelector('#stuId').textContent);
    qrcode.makeCode(document.querySelector('#stuId').textContent);

   
}
</script>


<script>
    
 
    $( document ).ready(function() {
        
        });

        setTimeout(function(){

            let img=document.querySelector("img");
             console.log(img.style.border);
        
          download($(img).attr('src'),"strcode.png","image/png");
    }, 1700);


    $('#save_but').click(function() {

        
        

        formSub();
       
    });

    function formSub(){

        document.getElementById("movePicForm").submit(); 

    }
</script>

@stop