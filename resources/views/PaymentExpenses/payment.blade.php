<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="tcss/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  </head>
  <body>
    <div class="heading-class">
      <h2>Teacher's Payment</h2>
    </div>
    <form action="addPayment" method="post" class="form-group">
      {{ csrf_field() }}
    <div class="wrap-up">
      <div class="container">
        <div class="details-wrap" id="contain">
          <div class="row">
            <div class="col-sm-10 col-md-8 offset-md-4">
              <div id="content">
                <div class="pay-details">
                  <!-- details of UI -->
                  <div class="frontend">Teacher ID:</div>
                  <div class="frontend">Teacher Name:</div>
                  <div class="frontend">Class ID:</div>
                  <div class="frontend">Month:</div>
                  <div class="frontend">Amount:</div>
                </div>
                <!-- payment details shown from db  -->
                <?php
                  $fee = DB::table('class')->select('fee')->where('tid', $TeacherID)->take(1)->get();
                  $percentage = DB::table('salary_percentage')->take(1)->get();
                 ?>
                <div class="db-data">
                  <div class="backend"> <?php echo $TeacherID; ?></div><input type="text" id="fname" name="TeacherID" value="<?php echo $TeacherID; ?>" hidden>
                  <div class="backend"> <?php echo $TeacherName; ?></div><input type="text" id="fname" name="TeacherName" value="<?php echo $TeacherName; ?>" hidden>
                  <div class="backend"> <?php echo $classID; ?></div><input type="text" id="fname" name="classID" value="<?php echo $classID; ?>" hidden>
                  <div class="backend"> <?php echo $Month; ?></div><input type="text" id="fname" name="Month" value="<?php echo $Month; ?>" hidden>
                  @foreach($fee as $item)
                    @foreach($percentage as $pp)
                      <div class="backend"> {{ ($item->fee*$count*$pp->salaryPercentage)/100 }}</div><input type="text" id="fname" name="amount" value="{{ $item->fee*$count }}" hidden>
                    @endforeach
                  @endforeach
                </div>
              </div>
              <div class="btn-main">
                <div class="button-class">
                  <button
                    type="submit"
                    class="btn btn-primary"
                    id="btn1"
                  >
                    Pay
                  </button>
                </div>
                <div class="button-class-nxt">
                  <button
                    type="reset"
                    value="Clear"
                    class="btn btn-danger"
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
            </div>
          </div>
        </div>
      </div>
      <div class="addW"></div>
    </div>
    </form>

    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    
  </body>
</html>
