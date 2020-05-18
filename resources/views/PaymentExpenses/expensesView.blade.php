@extends('PaymentExpenses.mainLayout')

 
@section('styles')
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="tcss/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    
    @stop
    
 
    @section('content')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('success'))
      <script>
      swal({
        title: "Deleted Successfully!",
        text: "",
        icon: "warning",
        button: "OK!",
      });
    </script>
@endif
    <div class="heading-class">
      <h2>Expenses View</h2>
    </div>
    <?php
      $exp = DB::table('add_expenses')->get();
    ?>
    <div class="container-fluid">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Expense Id</th>
            <th>Amount</th>
            <th>Purpose</th>
            <th>Time</th>
          </tr>
        </thead>

        <tbody id="table-body">
          @foreach($exp as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->amount }}</td>
            <td>{{ $item->purpose }}</td>
            <td>{{ $item->created_at }}</td>
            <td class="table-btn">
              <input type="text" id="id" name="id" value="{{ $item->id }}" hidden>
              <button type="button" onclick="window.location.href = 'deleteExpense?id={{ $item->id }}';" class="btn btn-primary" id="del-button">
                <i class="fa fa-trash" aria-hidden="true"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="button-class-nxt">
        <button onclick="location.href='{{url('PaymentExpenses')}}';" type="button" 
         class="btn btn-dark " id="btn3"  >Back</button>
      </div>
    </div>
    
    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    @stop
    
 
 
