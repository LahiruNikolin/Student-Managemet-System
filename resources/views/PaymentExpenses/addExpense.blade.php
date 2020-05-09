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
        title: "Good job!",
        text: "Expense Added Successfully",
        icon: "success",
        button: "OK!",
      });
    </script>
@endif
    <div class="heading-class">
      <h2>Add Expenses</h2>
    </div>
    <div class="white-space-add"></div>
    <div class="container" id="contain">
      <div class="row">
        <div class="col-sm-6 offset-sm-2 col-md-6 offset-md-3">

          <form action="addExpenses" method="post" class="form-group">
            {{ csrf_field() }}
            <label for="Amount"><p>Amount:</p></label>
            <input
              type="text"
              class="form-control"
              id="Amount"
              name="Amount"
              placeholder="Amount"
              required
            />
            <label for="Purpose"><p>Purpose:</p></label>
            <textarea
              id="Purpose"
              class="form-control"
              name="Purpose"
              placeholder="Purpose.."
              style="height: 170px;"
              required
            ></textarea>
            <div class="btn-main">
              <div class="button-class">
                <button
                  type="submit"
                  class="btn btn-primary"
                  id="btn1"
                >
                  Add
                </button>
              </div>
              <div class="button-class-nxt">
                <button type="reset" class="btn btn-danger" id="btn2">
                  Clear
                </button>
              </div>
              <div class="button-class-nxt">
              <button onclick="location.href='{{url('PaymentExpenses')}}';" type="button" 
               class="btn btn-dark " id="btn3"  >Back</button>
            </div>
          </div>
          </form>

        </div>
      </div>
    </div>
    <div class="addW"></div>

    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    @stop
    
 
 
      
