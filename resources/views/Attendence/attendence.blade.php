@extends('welcome')

 
@section('content')

 
    <div class="container">
        <div class="row">
            <div class="col-md-10">
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
                      <tr>
                        <td>st1243</td>
                        <td>Combined Maths</td>
                        <td>2021 A/L</td>
                        <td>3.13 PM</td>
                        <td><a class="btn btn-sm btn-success" href="#">View</a></td>
                        
                      </tr>
                      <tr>
                          <td>st4322</td>
                          <td>Physicss</td>
                          <td>2022 A/L</td>
                          <td>2.56 PM</td>
                          <td><a class="btn btn-sm btn-success" href="#">View</a></td>
                      </tr>
                      <tr>
                          <td>st4224</td>
                          <td>Biology</td>
                          <td>2021 A/L</td>
                          <td>2.40 PM</td>
                          <td><a class="btn btn-sm btn-success" href="#">View</a></td>
                      </tr>
                      <tr>
                        <td>st4224</td>
                        <td>Biology</td>
                        <td>2021 A/L</td>
                        <td>2.40 PM</td>
                        <td><a class="btn btn-sm btn-success" href="#">View</a></td>
                    </tr>
                    <tr>
                      <td>st4224</td>
                      <td>Biology</td>
                      <td>2021 A/L</td>
                      <td>2.40 PM</td>
                      <td><a class="btn btn-sm btn-success" href="#">View</a></td>
                  </tr>
                    </tbody>
                  </table>
                </div>  
            </div>
            <div class="col-md-2 mt-5"  >
                <div class="row">
                    <div class="col-md-12 mt-2 text-white" >
                        <a style="width:100%;" class="btn btn-lg btn-primary float-right" data-toggle="modal" data-target="#scanCardModal">Scan Card</a>
                    </div>
                    <div class="col-md-12 mt-2 text-white">
                      <button style="width:100%;" class="btn btn-lg btn-primary float-right" data-toggle="modal" data-target="#recordFeeModal" onclick="issueCard()" >Record Fees</button>
                  </div>
                    <div class="col-md-12 mt-2 text-white">
                        <a  style="width:100%;" class="btn btn-lg btn-primary float-right" data-toggle="modal" data-target="#issueCardModal">New Cards</a>
                    </div>
                    <div class="col-md-12 mt-2">
                       <a  style="width:100%;" class="btn btn-lg btn-primary float-right" href="./viewAttendence">Attendence </a> 
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
                  <td>119</td>
                  <td>2021 A/L</td>
                  <td>3.00-6.00</td>
                  <td><span class="badge badge-pill badge-info">Finished</span></td>
                </tr>
                <tr>
                  <td>Sugath Perera</td>
                  <td>Combined Maths</td>
                  <td>119</td>
                  <td>2021 A/L</td>
                  <td>3.00-6.00</td>
                  <td><span class="badge badge-pill badge-warning">Ongoing</span></td>
                </tr>
                <tr>
                  <td>Sugath Perera</td>
                  <td>Combined Maths</td>
                  <td>119</td>
                  <td>2021 A/L</td>
                  <td>3.00-6.00</td>
                  <td><span class="badge badge-pill badge-info">Finished</span></td>
                </tr>
                <tr>
                  <td>Sugath Perera</td>
                  <td>Combined Maths</td>
                  <td>119</td>
                  <td>2021 A/L</td>
                  <td>3.00-6.00</td>
                  <td><span class="badge badge-pill badge-warning">Ongoing</span></td>
                </tr>
                <tr>
                  <td>Sugath Perera</td>
                  <td>Combined Maths</td>
                  <td>119</td>
                  <td>2021 A/L</td>
                  <td>3.00-6.00</td>
                  <td><span class="badge badge-pill badge-warning">Ongoing</span></td>
                </tr>
               
                
                 
              </tbody>
          </table>
        </div>       
    </div>  
 
  
  <!--Scan card Modal -->
  <div class="modal fade" id="scanCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content justify-content-center">
        <div class="modal-header">
            <h5 class="modal-title" >Place the Card</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status" style="width: 5rem; height: 5rem;">
                  <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        
      </div>
    </div>
  </div>
<!--record fees -->
<div class="modal fade" id="recordFeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content justify-content-center">
      <div class="modal-header">
          <h5 class="modal-title" id="rfmTtitle">Place the Card</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer" id="recordFeesFoot">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Update</button>
        <button type="button" class="btn btn-success">Paid</button>
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
                  <tr>
                    <th scope="row">Mark</th>
                    <td>Otto</td>
                    <td>340</td>
                  <td><a href="./issueCard/{{5}}"class="btn btn-success">Issue</a></td>
                  </tr>
                  <tr>
                    <th scope="row">Jacob</th>
                    <td>Thornton</td>
                    <td>600</td>
                    <td><button class="btn btn-success">Issue</button></td>
                  </tr>
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
 
  function issueCard(){

    $('#recordFeesFoot').hide();
    $('#printJS-card').hide();

    $('#loader').show()
      
     

    setTimeout(function(){

      $('#loader').hide();
      $('#recordFeesFoot').show();
      $('#printJS-card').show();

     document.querySelector('#rfmTtitle').textContent="Student Details";
      
   
}, 2000);
  }
</script>

@stop