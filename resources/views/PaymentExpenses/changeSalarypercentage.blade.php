<?php
      $exp = DB::table('salary_percentage')->get();
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="tcss/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  </head>
  <body>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('success'))
      <script>
      swal({
        // title: "Good job!",
        text: "Salary Percentage Updated Successfully ",
        icon: "success",
        button: "OK!",
      });
    </script>
@endif
    <div class="heading-class">
      <h2>Change Teachers' Salary Percentage</h2>
    </div>
    <div class="white-space-chg"></div>
    <div class="new-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-3">
            <div class="form-padding">
              <form action="updateSalaryPercentage" method="post" class="form-group">
                {{ csrf_field() }}
                @foreach($exp as $item)
        <label for="salaryPercentage" ><p>Change salary percentage: Current Percentage is {{ $item->salaryPercentage }}%</p></label>
        @endforeach
                <input
                  type="number"
                  class="form-control"
                  id="salaryPercentage"
                  name="salaryPercentage"
                  placeholder="Salary Percentage "
                  min="1" max="100"
                  required
                />

                <div class="btn-main">
                  <div class="button-class">
                    <button type="submit" class="btn btn-primary" id="btn1">
                      Change
                    </button>
                  </div>
                  <div class="button-class-nxt">
                    <button type="reset" class="btn btn-danger" onclick="clearFeilds()" id="btn2">
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
    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function clearFeilds(){
        document.getElementById("salaryPercentage").value="";
      }
    </script>
  </body>
</html>
