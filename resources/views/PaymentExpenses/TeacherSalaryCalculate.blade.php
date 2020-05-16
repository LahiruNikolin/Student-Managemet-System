@extends('PaymentExpenses.mainLayout')

 
@section('styles')
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="tcss/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    @stop
    
 
    @section('content')

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('success'))
      <script>
      swal({
        // title: "Good job!",
        text: "Teacher Payment Added Successfully",
        icon: "success",
        button: "OK!",
      });
    </script>
@endif
    <div class="heading-class">
      <h2>Calculate Teacher's Salary</h2>
      

    </div>
    <div class="container">
      <div class="white-space"></div>
      <div class="details-wrap" id="contain-child">
        <div class="row">
          <div class="col-md-6 offset-3">
            <div class="form-padding">
              <form action="calSal" method="post" class="form-group">
                {{ csrf_field() }}
                <label for="TeacherName"><p>Teacher Name:</p></label>
                <input
                  class="form-control"
                  type="text"
                  id="TeacherName"
                  name="TeacherName"
                  placeholder="Teacher Name"
                  required
                />
                <label for="TeacherID"><p>Teacher ID:</p></label>
                <input
                  class="form-control"
                  type="text"
                  id="TeacherID"
                  name="TeacherID"
                  placeholder="Teacher ID"
                  required
                />
                <label for="ClassID"><p>Class ID:</p></label>
                <input
                  class="form-control"
                  type="text"
                  id="classID"
                  name="classID"
                  placeholder="Class ID"
                  required
                />
                <label for="Month"><p>Month:</p></label>
                <input
                  class="form-control"
                  type="text"
                  id="Month"
                  name="Month"
                  placeholder="Month"
                  required
                />
                <div class="btn-main">
                  <div class="button-class">
                    <button
                      type="submit"
                      class="btn btn-primary"
                      id="btn1"
                    >
                      Calculate
                    </button>
                  </div>
                  <div class="button-class-nxt">
                    <button
                      type="button"
                      class="btn btn-danger"
                      value="Clear"
                      id="btn2"
                      onclick="clearFeilds()"
                    >
                      Clear
                    </button>
                  </div>
                  <div class="button-class-nxt">
                    <button onclick="location.href='{{url('payemntManagement')}}';" type="button" 
                     class="btn btn-dark " id="btn3"  >Back</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="addW"></div>     
    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function clearFeilds(){
        document.getElementById("TeacherName").value="";
        document.getElementById("TeacherID").value="";
        document.getElementById("classID").value="";
        document.getElementById("Month").value="";
      }
    </script>
@stop
    
 
