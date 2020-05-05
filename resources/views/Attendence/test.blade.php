 
<!--
    <form method="POST"  action="./student">

        {{ csrf_field() }}

         <input type="hidden" name="_method" value="put">  

    <div class="form-group">
      <label for="fname">First Name</label>
      <input type="text" class="form-control" name="fname" id="fname" aria-describedby="emailHelp" placeholder="First Name">
       
    </div>
    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" name="lname" id="lname" aria-describedby="emailHelp" placeholder="Last Name">
        
      </div>
      <div class="form-group">
        <label for="year">A/L Year</label>
        <input type="email" class="form-control" id="year" aria-describedby="emailHelp" placeholder="Enter email">
         
      </div>
     
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  -->
  <!DOCTYPE html>
<html>
<head>
    <title>The Date</title>
    <meta charset="utf-8" /> 
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> 
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> 
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <style>
       .timepicker {
      z-index: 3600 !important; /* has to be larger than 1050 */
       position:unset;
    }

    .bootstrap-timepicker-widget.dropdown-menu {
    z-index: 3700 !important;
}

    </style>
    <script>
     $(function () {
            $('#datetimepicker1').timepicker({
            });

     
    </script>
</head>
<body>
    <div class="container">
        <div class="">&nbsp;</div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Launch demo modal
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pick your Date</h4>
                </div>
                <div class="modal-body">
                    <input id="datetimepicker1" type="text" class="form-control" />
                    <div class="form-group">
      <label for="input_search" class="sr-only">Start time</label>
      <input type="text" name="starttime" class="form-control timepicker" id="datepicker">
      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script>

$('#myModal').on('shown.bs.modal', function () {
  $('#datepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: true,
    dropdown: true,
    scrollbar: true,
    zindex: 2000

});
 
  
});
    

  </script>


</body>
</html>