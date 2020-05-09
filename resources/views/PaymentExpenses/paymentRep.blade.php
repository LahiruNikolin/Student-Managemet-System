
<?php $ex = DB::table('payment')->whereBetween('created_at', [$from, $to])->get(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Report</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid grey;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dce7f7;
}
#div1{
    padding: 15px 25px;
    width: auto;
    height: 5rem;
    background-color: #1aa3ff;
    text-align: center;
    color: white;
    margin-bottom: 60px;
    margin-left: none;
    margin-right: none;
    font-family: sans-serif;
    font-size: 15px;
  }
  #tot1{
    font-family: sans-serif;
    font-size: 20px;
    text-align: left;
  }
</style>
</head>
<body onload="window. print()">

  <div id="div1">
     <h2>Payment Report From : {{ $from }}  To: {{ $to }}</h2>
     <?php $total=0; ?>
  </div>   
<table class="container">
  <tr>
    <th>Teacher Name</th>
    <th>Amount</th>
    <th>Month</th>
  </tr>
  @foreach($ex as $data)
  <tr>
    <td>{{$data->tname}}</td>
    <td>Rs.{{$data->amount}}</td><?php $total = $total + $data->amount ?>
    <td>{{$data->month}}</td>
  </tr>
  <div id="tot1">
     @endforeach
     <?php echo "Total Payment: Rs.";
     echo $total; ?>
     
  </div>


</table>
</body>
</html>
