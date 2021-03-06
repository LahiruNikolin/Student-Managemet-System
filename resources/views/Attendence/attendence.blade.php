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
                      <?php $id=$todayStudent["sid"];?>

                        <td>{{$todayStudent["sid"]}}</td>
                        <td>{{$todayStudent["subject"]}} </td>
                        <td>{{$todayStudent["year"]}} </td>
                        <td>{{$todayStudent["time"]}} </td>
                        <td><a class="btn btn-sm btn-success" href="./savetask/{{$id}}">View</a></td>
                        
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
                        <a  style="width:100%;" class="btn btn-cust btn-lg btn-primary float-right" data-toggle="modal" data-target="#issueCardModal">Class Cards</a>
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
                @foreach ($todayClasses as $todayClass)
                <tr>
                  <td> {{$todayClass["teacherName"]}}</td>
                  <td>{{$todayClass["subName"]}}</td>
                  <td>{{$todayClass["size"]}}</td>
                  <td>{{$todayClass["year"]}}</td>
                  <td>{{$todayClass["time"]}}</td>
                  <td><span class="badge badge-pill 
                    @if($todayClass["status"]=='Ongoing')
                    badge-warning
                    @elseif($todayClass["status"]=='Coming up')
                    badge-info
                    @else
                    badge-success
                    @endif
                    "  
                    >
                    
                    {{$todayClass["status"]}}</span>
                  
                  </td>
                </tr>

                @endforeach
                
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
         
       
      </div>
      <div class="modal-footer" id="recordFeesFoot">
         
      </div>
      
    </div>
  </div>
</div>
 
  
   <!-- Issue card modal -->
  <div class="modal fade" id="issueCardModal" tabindex="-1" 
  role="dialog" aria-labelledby="exampleModalCenterTitle" 
  aria-hidden="true"
   
  >
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Students</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
          <input class="form-control" id="myInput2" type="text" placeholder="Search..">
            <table class="table table-hover" id="cardTbl">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Year</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($newStudents)> 0)
                      @foreach ($newStudents as $newStudent)
                      <tr>
                      <th scope="row">{{$newStudent->id}}</th>
                        <th >{{$newStudent->fname}}</th>
                        <td>{{$newStudent->lname}}</td>
                        <td>{{$newStudent->email}}</td>
                        <td>{{$newStudent->year}}</td>
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
//todays attends
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
     
    var value = $(this).val().toLowerCase();
    $("#stuTble tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
//issue card search
$(document).ready(function(){
  $("#myInput2").on("keyup", function() {
     
    var value = $(this).val().toLowerCase();
    $("#cardTbl tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 
  function markAttendence(){

    initScan(document.querySelector('#scanModalBody'),1);
    
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
            
            document.getElementById("feesForm").submit();
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