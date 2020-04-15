@extends('welcome')

 
@section('content')

@include('Inc.scanForm')
@include('Inc.feesForm')
 
    <div class="container">
        <div class="row">
            <div class="col-md-10">

              @include('Inc.scanFeedback')

              <p>Today's Attendence</p>
              <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar1">
                  
                  <table class="table table-hover table-dark" id="stuTble">
                    <thead>
                      <tr>
                        <th>StudentID</th>
                        
                        <th>Subject</th>
                        <th>Year</th>
                        <th>Time</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($todayStudents)> 0)
                      @foreach ($todayStudents as $todayStudent)

                      <tr>
                      

                        <td>{{$todayStudent["sid"]}}</td>
                        <td>{{$todayStudent["subject"]}} </td>
                        <td>{{$todayStudent["year"]}} </td>
                        <td>{{$todayStudent["time"]}} </td>
                        <td><a class="btn btn-sm btn-success" href="#">View</a></td>
                        
                      </tr>
                      @endforeach
                       @endif
                    </tbody>
                  </table>
                </div>  
            </div>
            <div class="col-md-2"  style="margin-top:2.1rem;">
                <div class="row">
                    <div class="col-md-12 mt-2 text-white" >
                        <a style="width:100%;" class="btn btn-cust btn-lg btn-primary float-right" data-toggle="modal" data-target="#scanCardModal" onclick="markAttendence()">Scan Card</a>
                    </div>
                    <div class="col-md-12 mt-2 text-white">
                      <button style="width:100%;" class="btn btn-cust btn-lg btn-primary float-right" data-toggle="modal" data-target="#recordFeeModal" onclick="recordFees()" >Record Fees</button>
                  </div>
                    <div class="col-md-12 mt-2 text-white">
                        <a  style="width:100%;" class="btn btn-cust btn-lg btn-primary float-right" data-toggle="modal" data-target="#issueCardModal">New Cards</a>
                    </div>
                    <div class="col-md-12 mt-2">
                       <a  style="width:100%;" class="btn btn-cust btn-lg btn-primary float-right" href="./viewAttendence">Attendence </a> 
                    </div>
                </div>   
              </div>    
        </div>
        <div>
          <p class="mt-1">Today's Classes</p>
          <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-hover table-dark">
              <thead>
                <tr>
                  <th>Teacher</th>
                  
                  <th>Subject</th>
                  <th>Size</th>
                  <th>Year</th>
                  <th>Time</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Sugath Perera</td>
                  <td>Combined Maths</td>
                  <td>27</td>
                  <td>2021 A/L</td>
                  <td>3.00-6.00</td>
                  <td><span class="badge badge-pill badge-info">Finished</span></td>
                </tr>
                <tr>
                  <td>Jagath Perera</td>
                  <td>Physics</td>
                  <td>19</td>
                  <td>2021 A/L</td>
                  <td>10.00-12.00</td>
                  <td><span class="badge badge-pill badge-warning">Ongoing</span></td>
                </tr>
                <tr>
                  <td>Thissa Jananayake</td>
                  <td>Biology</td>
                  <td>119</td>
                  <td>2022 A/L</td>
                  <td>8.00-10.00</td>
                  <td><span class="badge badge-pill badge-info">Finished</span></td>
                </tr>
                <tr>
                  <td>Saman Kumara</td>
                  <td>Logic</td>
                  <td>39</td>
                  <td>2020 A/L</td>
                  <td>10.00-12.00</td>
                  <td><span class="badge badge-pill badge-warning">Ongoing</span></td>
                </tr>
                <tr>
                  <td>Malaka Perera</td>
                  <td>Accounts</td>
                  <td>17</td>
                  <td>2021 A/L</td>
                  <td>9.00-3.00</td>
                  <td><span class="badge badge-pill badge-warning">Ongoing</span></td>
                </tr>
               
                
                 
              </tbody>
          </table>
        </div>       
    </div>  
 
  
  <!--Scan card Modal -->
  <div class="modal fade" id="scanCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog " role="document">
      <div id="scan-modal" class="modal-content justify-content-center" style="width:42rem;">
        <div class="modal-header">
          <div id="spinner1" class="spinner-border" role="status" style="width: 2rem; height: 2rem;">
            <span class="sr-only">Loading...</span>
          </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="mod1-close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div id="scanModalBody" class="modal-body">

            <!--
            <div id="video-container" class="mb-2">
                <video id="video-preview"></video>
                <canvas id="qr-canvas" style="display: none;" ></canvas>
          
            </div>-->
            
            <div class="d-flex justify-content-center">
              <div id="scan-success" style="display:none;">
                <span style="color:green; font-size:4rem;"><i class="fas fa-check-circle"></i></span>
              </div>
              
                <h5  id="scan-hint" class="modal-title " >Place the Card</h5>
            </div>
        </div>
        <div class="modal-footer cardScannerFooter"  style="display:none;" >
          <div class="alert alert-success " role="alert" style="margin:auto;">
            <p class="text-center">Scan Completed!</p>
          </div>
        </div>
        
      </div>
    </div>
  </div>
<!--record fees -->
<div class="modal fade" id="recordFeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content justify-content-center" style="width:42rem;">
      <div class="modal-header">
          <h5 class="modal-title" id="rfmTtitle">Place the Card</h5>
          <button type="button" id='mod2-close' class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div id="recordFeeModalBody" class="modal-body">
         
        <!--
        <div id="loader">
          <div class="d-flex justify-content-center"  >
            <div class="spinner-border" role="status" style="width: 5rem; height: 5rem;">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>
        
          <div  class="card"  id="printJS-card" >
            <div class="card-body"    >
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
      -->
      </div>
      <div class="modal-footer" id="recordFeesFoot">
         
      </div>
      
    </div>
  </div>
</div>
 
  
   <!-- Issue card modal -->
  <div class="modal fade" id="issueCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">New Students</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <table class="table table-hover">
                <thead>
                  <tr>
                    
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Class Fee</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($newStudents)> 0)
                      @foreach ($newStudents as $newStudent)
                      <tr>
                        <th scope="row">{{$newStudent->fname}}</th>
                        <td>{{$newStudent->lname}}</td>
                        <td>{{$newStudent->fee}}</td>
                      <td><a href="./issueCard/{{$newStudent->id}}"class="btn btn-success">Issue</a></td>
                      </tr>
                      @endforeach
                  
                  @endif
                </tbody>
              </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



<script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
     
    var value = $(this).val().toLowerCase();
    $("#stuTble tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 
  function markAttendence(){

    initScan(document.querySelector('#scanModalBody'),1);
    
    /*
    $('#recordFeesFoot').hide();
    $('#printJS-card').hide();

    $('#loader').show()
      
     

    setTimeout(function(){

      $('#loader').hide();
      $('#recordFeesFoot').show();
      $('#printJS-card').show();

     document.querySelector('#rfmTtitle').textContent="Student Details";
      
   
}, 2000); */
  }
  
  function recordFees(){
    initScan(document.querySelector('#recordFeeModalBody'),2);
  }
</script>

 <!-- scanner -->
<script type="text/javascript">

let suc_flash=document.querySelector('#scan-success');

let hint=document.querySelector('#scan-hint');
let scnModal=document.querySelector('#scan-modal');
let spinner=document.querySelector('#spinner1');
let modalFooter=document.querySelector('div.cardScannerFooter');
let modalType=1;

function initScan(body,type) {

     //return;
     
     insertVideoContainer(body);
     modalType=type;
     hint.style.display="block";
     //vid_cont.style.display="block";
    /* Ask for "environnement" (rear) camera if available (mobile), will fallback to only available otherwise (desktop).
    * User will be prompted if (s)he allows camera to be started */
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" }, audio: false }).then(function(stream) {
      var video = document.getElementById("video-preview");
      video.srcObject = stream;
      video.setAttribute("playsinline", true); /* otherwise iOS safari starts fullscreen */
      video.play();
      setTimeout(tick, 100); /* We launch the tick function 100ms later (see next step) */
    })
    .catch(function(err) {
      console.log(err); /* User probably refused to grant access*/
    });
};


function tick() {
      var video                   = document.getElementById("video-preview");
      var qrCanvasElement         = document.getElementById("qr-canvas");
      var qrCanvas                = qrCanvasElement.getContext("2d");
      var width, height;

      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        qrCanvasElement.height  = video.videoHeight;
        qrCanvasElement.width   = video.videoWidth;
        qrCanvas.drawImage(video, 0, 0, qrCanvasElement.width, qrCanvasElement.height);
        try {

          var result = qrcode.decode();
          if(modalType==1){
            document.querySelector('#stu_id').value=result;
            // console.log();
            
            //console.log(result);
            updateScanModal();

            setTimeout(function(){  document.getElementById("scanForm").submit(); }, 1000);
          }
          else if(modalType==2){
            document.querySelector('#stu_id2').value=result;
            document.querySelector('#recordFeeModalBody')
            .removeChild(document.querySelector('#video-container'));
            setTimeout(function(){  document.getElementById("feesForm").submit(); }, 1000);
          }
        
         
          /* Video can now be stopped */
          video.pause();
          video.src = "";
          video.srcObject.getVideoTracks().forEach(track => track.stop());

          /* Display Canvas and hide video stream */
          qrCanvasElement.classList.remove("hidden");
          video.classList.add("hidden");
        } catch(e) {
          /* No Op */
        }
      }

      /* If no QR could be decoded from image copied in canvas */
      if (!video.classList.contains("hidden"))
        setTimeout(tick, 100);
      }

function updateScanModal(){
  
  suc_flash.style.display="block";
  hint.style.display="none";
  scnModal.style.width="30rem";
  spinner.style.display="none";
  //vid_cont.parentNode.removeChild(vid_cont);
  document.querySelector('#video-container').style.display="none";
  modalFooter.style.display="block";
}

document.querySelector('#mod1-close').addEventListener('click', e =>{
 
      window.location.href = "./attendence";
      
});
document.querySelector('#mod2-close').addEventListener('click', e =>{
 
window.location.href = "./attendence";
 
});

//ALERTs scan related
if(document.querySelector(".scanFD")!= null){

  setTimeout(function(){  document.querySelector(".scanFD").style.display='none';  }, 3000);

  
}

</script>

<!--fees record js
<script src="{{asset('js/attendence/recordFees.js')}}"></script> -->
<script>

function insertVideoContainer(body){
 // console.log(div);
    let div=document.createElement('div');
    let video=document.createElement('video');
    let canvas=document.createElement('canvas');
    div.setAttribute("id", "video-container");
    div.setAttribute("class", "mb-2");
    video.setAttribute("id", "video-preview");
    canvas.setAttribute("id", "qr-canvas");
    canvas.setAttribute("style", "display:none;");

    div.appendChild(video);
    div.appendChild(canvas);
    body.appendChild(div);

}
 
 
</script>
@stop