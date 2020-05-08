<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="tcss/style.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Expenses Management 2</title>
  </head>
  <body>
    <div class="heading-class">
      <h2 class="expense-manage">Payment Management</h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-xs-8 col-sm-6 col-md-6" id="col-id">
          <div class="white-space-chg"></div>
          <!-- Card for the specific tasks -->
          <div class="card" style="width: 30rem;">
            <div class="card-header">
              <h4 class="card-heading">Tasks</h4>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <div class="list-wrap">
                  <li class="list-group-item" id="items-access">
                    <div class="msg">Calculate Teacher's Salary</div>
                    <div class="button-cls">
                      <button type="button" onclick="window.location.href = 'TeacherSalaryCalculate';" class="btn btn-primary" id="linked">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                      </button>
                    </div>
                  </li>
                </div>
                <div class="list-wrap">
                  <li class="list-group-item" id="items-access">
                    <div class="msg">View Payment Table</div>
                    <div class="button-cls-child-first">
                      <button type="button" onclick="window.location.href = 'TeacherpaymentView';" class="btn btn-primary" id="linked">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                      </button>
                    </div>
                  </li>
                </div>
                <div class="list-wrap">
                  <li class="list-group-item" id="items-access">
                    <div class="msg">Change Percentage Number</div>
                    <div class="button-cls-child-second">
                      <button type="button" onclick="window.location.href = 'changeSalarypercentage';" class="btn btn-primary" id="linked">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                      </button>
                    </div>
                  </li>
                </div>
                <div class="list-wrap">
                  <li class="list-group-item" id="items-access">
                    <div class="msg">Generate Payment Reports</div>
                    <div class="button-cls-child-second">
                      <button type="button" onclick="window.location.href = '#';" class="btn btn-primary" id="linked">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                      </button>
                    </div>
                  </li>
                </div>
              </ul>
              
            </div>
            <div class="button-class-nxt">
              <button onclick="location.href='{{url('attendence')}}';" type="button" 
               class="btn btn-dark " id="btn3"  >Back</button>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
  </body>
</html>
