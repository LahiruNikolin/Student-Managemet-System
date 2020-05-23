
<?php $rep = DB::table('class')->where('day', $day)->where('tid',$id)->get(); ?>

<!DOCTYPE html>
<html>
<head>
<title>Report</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body onload="window. print()">

<h2>Report. Day : {{ $day }}  </h2>

<table class="container">
  <tr>
    <th>From</th>
    <th>To</th>
    <th>Fee</th>
    <th>Year</th>
    <th>Created</th>
  </tr>
  @foreach($rep as $data)
  <tr>
    <td>{{$data->from}}</td>
    <td>{{$data->to}}</td>
    <td>{{$data->fee}}</td>
    <td>{{$data->year}}</td>
    <td>{{$data->created_at}}</td>
  </tr>

  @endforeach



</table>
</body>
</html>
