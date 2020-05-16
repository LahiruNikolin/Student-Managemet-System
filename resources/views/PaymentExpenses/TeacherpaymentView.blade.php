
@extends('PaymentExpenses.mainLayout')

 
@section('styles')

<link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="tcss/style.css" />
@stop
    
 
@section('content')
  
    <div class="heading-class">
      <h2>Teacher Payment View</h2>
    </div>
    <?php
      $exp = DB::table('payment')->get();
    ?>
    <div class="container-fluid">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Payment Id</th>
            <th>Teacher Id</th>
            <th>Class Id</th>
            <th>Teacher Name</th>
            <th>Amount</th>
            <th>Month</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody id="table-body">
          @foreach($exp as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->tid }}</td>
            <td>{{ $item->cid }}</td>
            <td>{{ $item->tname }}</td>
            <td>{{ $item->amount }}</td>
            <td>{{ $item->month }}</td>
            <td>{{ $item->created_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="button-class-nxt">
        <button onclick="location.href='{{url('payemntManagement')}}';" type="button" 
         class="btn btn-dark " id="btn3"  >Back</button>
      </div>
    </div>

    <script src="./assets/js/jquery-3.2.1.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
 
@stop