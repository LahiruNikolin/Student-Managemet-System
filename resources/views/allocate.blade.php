 

<?php
$id=$_GET['id'];
$type=$_GET['type'];

$sub = DB::table('subject')->where('id',$id)->get();

foreach($sub as $subject_new) {
    $subject_name = $subject_new->subjectName;
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
        <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">  

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-toggle.min.css')}}">  
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="{{asset('../node_modules/chart.js/dist/Chart.bundle.js')}}"></script>
   
  @include('Inc.scannerImports')

    <title>Admin Panel</title>
    
    <style>
 
      .subject-allocate-button-edit {
        display: block;
      }

      .subject-allocate-button-delete {
        display: block;
        background-color: #ff3a3a;
        border-color: #ff3a3a;
      }

      .subject-allocate-button-delete:hover {
        background-color: red;
        border-color: red;
      }

      .add-subject-category-wrapper {
        max-width: 23%;
      }

      .add-subject-button-wrapper {
        text-align: center;
      }

      .before-add-subject-button {
        background-color: #01dd01;
        border-color: #01dd01;
      }

      .before-add-subject-button:hover {
        background-color: green;
      }

      .after-add-subject-button {
        background-color: #01dd01;
        border-color: #01dd01;
      }

      .after-add-subject-button:hover {
        background-color: green;
      }

      .btn.btn-primary {
        margin-left: 0px;
      }

      .search-button {
        margin-top: 0px !important;
      }

      .teacher-absent-button {
        background-color: #ff3a3a;
        border-color: #ff3a3a;
      }

      .teacher-absent-button:hover {
        background-color: red;
        border-color: red;
      }

      .error-modal {
        margin-top: 0px !important;
        background-color: #ff3a3a;
        border-color: #ff3a3a;
      }

      .error-modal:hover {
        background-color: red;
        border-color: red;
      }

      .teacher-wrapper {
        margin-top: 10px;
      }

      .allocate-teacher-button {
        margin-top: 0px !important;
        background-color: #01dd01;
        border-color: #01dd01;
      }

      .allocate-teacher-button:hover {
        margin-top: 0px !important;
        background-color: green;
      }


    </style>
   
</head>
<body>
  <!-- header-->
  @include('Inc.header')
  <section id='man'>
    <div class="side-list">
      <nav>
        <ul>
           
          <li><span  class="ic"><i class="fas fa-bookmark"></i></span>
            <span> <a href="{{url('attendence')}}"> Attendence & Card Management</a></span>
            <div class="lis-active"></div>
          </li>
         
          <li><span  class="ic"><i class="fab fa-sellsy"></i></span>
            <span> <a href="#"> Students Management</a></span>
            <div class="lis-active"></div>
          </li>
           
          <li><span  class="ic"><i class="fas fa-users"></i></span>
            <span> <a href="customer.html">Teacher Management</a></span>
            <div class="lis-active"></div>
          </li>

          <li><span class="ic"><i class="fas fa-lemon"></i></span>
            <span> <a href="subject"> Subject Management</a></span>
            <div class="lis-active"></div>
                    </li>
                    <li><span class="ic"><i class="fas fa-ticket-alt"></i></span>
            <span> <a href="ticket.html"> External Staff Management</a></span>
            <div class="lis-active"></div>
          </li>
          
          <li><span class="ic"><i class="fas fa-city"></i></span>
            <span> <a href="#"> Payment Management</a></span>
            <div class="lis-active"></div>
          </li>
          <li><span class="ic"><i class="fas fa-file-invoice-dollar"></i></span>
            <span> <a href="#"> Expenses Management</a></span>
            <div class="lis-active"></div>
          </li>
          
        </ul>
      </nav>
      
    </div>
    <div class="sub-main">
      <div class="container">
        @yield('content')
        <?php

          // $result = DB::table('subject')->select('subjectName')->where('id', $id)->first();
          $teachers = DB::table('teacher')->where('subject',$subject_name)->where('status','1')->get();
          $count_number = 0;
        ?>
        <a class="btn btn-primary" role="button" href="subject">Subject Management</a>
          @foreach($teachers as $item)
          <?php $count_number ++ ;?>
          <div class="modal fade" id="edit-allocated-teacher{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Editing day and time of Mr. {{ $item->fname }} for {{ $item->subject }} Subject</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="updateDateTime">
                  {{ csrf_field() }}
                  <input type="text" name="id" class="form-control" value="{{ $item->id }}" hidden>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="day">Day:</label>
                      <input type="text" class="form-control"  name="date" value="{{ $item->date }}">
                    </div>
                    <div class="form-group">
                      <label for="time">Time:</label>
                      <input type="text" class="form-control" name="time" value="{{ $item->time }}">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary allocate-teacher-button">Save Changes</button>
                </div>
              </form>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($teachers as $item)
          <div class="modal fade" id="delete-modal{{ $item->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Allocation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Do you wanna delete?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <form method="post" action="deleteAllocation">
                    {{ csrf_field() }}
                    <input type="text" name="id" class="form-control" value="{{ $item->id }}" hidden>
                  <button type="submit" class="btn btn-primary error-modal">Yes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach

          <div class="modal fade" id="already-allocated-teacher" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Subject alrady allocated</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>You cannot allocated a teacher. Delete exisiting allocation and retry.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                </div>
              </div>
            </div>
          </div>
          <div class="shadow" id="subjects">
              <div class="container">
                  <div class="text-center">

                      <h1><?php echo $type; ?></h1>
                    @foreach($sub as $item)
                    <h1 style="color: rgb(2,129,255);">{{ $item->subjectName }}</h1>
                    @endforeach


                  </div>
                  <h5 id="presentAllocation" style="color: rgb(0,128,255);">Present Allocation</h5>

                  <div id="table">
                      <div class="container">
                          <div class="row text-center" id="row01">
                              <div class="col">
                                  <h5 class="text-center">Teachers Name</h5>
                              </div>
                              <div class="col">
                                  <h5 class="text-center">Day</h5>
                              </div>
                              <div class="col">
                                  <h5 class="text-center">Time</h5>
                              </div>
                              <div class="col"></div>
                              <div class="col"></div>
                          </div>
                          @foreach($teachers as $item)
                          <div class="row text-center" id="row02">
                              <div class="col">
                                  <p class="text-center">{{ $item->fname }} {{ $item->lname }}</p>
                              </div>
                              <div class="col">
                                  <p class="text-center">{{ $item->date }}</p>
                              </div>
                              <div class="col">
                                  <p class="text-center">{{ $item->time }}</p>
                              </div>
                              <div class="col">
                                  <a class="btn btn-primary subject-allocate-button-edit" data-toggle="modal" data-target="#edit-allocated-teacher{{ $item->id }}" role="button" href="">Edit</a>
                              </div>
                              <div class="col">
                                  <a class="btn btn-primary subject-allocate-button-delete" data-toggle="modal" data-target="#delete-modal{{ $item->id }}" role="button" href="">Delete</a>
                              </div>
                          </div>
                          @endforeach
                      </div>
                  </div>
                  <div class="row">
                          @if( $count_number > 0 and $type == "Special" )
                              <a class="btn btn-primary before-add-subject-button" role="button" data-toggle="modal" data-target="#already-allocated-teacher" href="">Allocate Teacher</a>
                          @elseif( $count_number > 1 and $type == "Normal" )
                              <a class="btn btn-primary before-add-subject-button" role="button" data-toggle="modal" data-target="#already-allocated-teacher" href="">Allocate Teacher</a>
                          @else
                              @foreach($sub as $item)
                              <a class="btn btn-primary before-add-subject-button" role="button" href="allocate-teacher?subid={{ $item->subjectName }}">Allocate Teacher</a>
                              @endforeach
                          @endif
                  </div>
              </div>
          </div>
      </div>
       
    </div>
  </section>
  <script src="{{asset('../node_modules/print-js/dist/print.js')}}"></script>
  
  
  
   
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('js/all.js')}}"></script>
<script type="text/javascript" src="{{asset('js/printThis.js')}}"></script>

 
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/bootstrap-toggle.min.js')}}"></script>

 
</body>

</html>