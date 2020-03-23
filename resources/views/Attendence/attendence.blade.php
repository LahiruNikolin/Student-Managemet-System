@extends('welcome')

 
@section('content')

 
    <div class="container m">
        <div class="row">
            <div class="col-md-9">

                


            </div>
            <div class="col-md-3 mt-3">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#scanCardModal">Scan Card</button>
                    </div>
                    <div class="col-md-12 mt-2">
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#issueCardModal">New Cards</button>
                    </div>
                    <div class="col-md-12 mt-2">
                       <a class="btn btn-primary float-right" href="./viewAttendence">Attendence </a> 
                    </div>
                </div>
               
                
            </div>
            

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

<h3>Upcoming Classes</h3>
 


  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>Teacher</th>
                      
                      <th>Subject</th>
                      <th>Time</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Sugath Perera</td>
                      <td>Combined Maths</td>
                      <td>3.00-6.00</td>
                      
                    </tr>
                    <tr>
                        <td>Kamal Perera</td>
                        <td>Physicss</td>
                        <td>3.00-6.00</td>
                      
                    </tr>
                    <tr>
                        <td>Namal Perera</td>
                        <td>Biology</td>
                        <td>3.00-6.00</td>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
        <div class="col-md-6">
            <p>hello</p>
        </div>
    </div>
</div>

 

@stop