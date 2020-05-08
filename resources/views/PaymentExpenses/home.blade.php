@extends('PaymentExpenses.mainLayout')

 
@section('styles')
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="tcss/style.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Expense Management</title>
    @stop
    
 
    @section('content')
    <div class="heading-class">
      <h2 class="expense-manage">Expenses Management</h2>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-xs-10 col-sm-6 col-md-6" id="col-id">
          <div class="white-space-chg"></div>
          <!-- Card for the specific tasks -->
          <div class="card" style="width: 30rem;">
            <div class="card-header">
              <h4 class="card-heading">Tasks</h4>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <div class="list-wrapper">
                  <li class="list-group-item" id="items-access">
                    <div class="msg">Add Expenses</div>
                    <div class="button-padding">
                      <button type="button" onclick="window.location.href = 'addExpense';" class="btn btn-primary" id="linked">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                      </button>
                    </div>
                  </li>
                </div>
                <div class="list-wrapper">
                  <li class="list-group-item" id="items-access">
                    <div class="msg">View and Remove Expenses</div>
                    <div class="button-nxt-padding">
                      <button type="button" onclick="window.location.href = 'expensesView';" class="btn btn-primary" id="linked">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                      </button>
                    </div>
                  </li>
                </div>
                <div class="list-wrapper">
                  <li class="list-group-item" id="items-access">
                    <div class="msg">Expenses Reports</div>
                    <div class="button-nxt-padding">
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
  @stop
