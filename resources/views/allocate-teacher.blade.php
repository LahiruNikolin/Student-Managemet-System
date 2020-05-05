<?php
$subid=$_GET['subid'];

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

      .timepicker {
      z-index: 3600 !important; /* has to be larger than 1050 */
    }


    </style>
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
</head>
<body>
  <header>
    <div id='lil-hero'><span class="mr-2"  ><i class="fas fa-universal-access"></i></span>Student Manager</div>
    <div id='head-mid' class="d-flex justify-content-center">

      <button type="button" class="btn btn-primary m-1">
        Students <span class="badge badge-danger">234</span>
        </button>

        <button type="button" class="btn btn-primary m-1">
        Teachers <span class="badge badge-danger">23</span>
        </button>

        <button type="button" class="btn btn-primary m-1">
        Subjects <span class="badge badge-danger">14</span>
        </button>


    </div>
    <div id='admin-ic-area'>
      <span class="avatar"><i class="fas fa-user-alt"></i></span>
      <div class="d-flex justify-content-end  mt-3 mr-4">
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle"
              type="button" id="dropdownMenu1" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
            Lahiru
          </button>
          <div class="dropdown-menu"  aria-labelledby="dropdownMenu1">
            <a class="dropdown-item" href="#!">Settings</a>
            <a class="dropdown-item" href="#!">Logout</a>
             
          </div>
          </div>
      </div>
       
    </div>
  </header>
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
            if (isset($_GET["search_text"])) {
                $teachers = DB::table('teacher')->where('fname', 'like', '%' .  $_GET["search_text"] . '%')->orWhere('lname', 'like', '%' .  $_GET["search_text"] . '%')->get();         
            } else {
                $teachers = DB::table('teacher')->get();
            }
        ?>

          <a class="btn btn-primary" role="button" href="subject">Back</a>
          <!-- Modal -->
          @foreach($teachers as $item)
          <div class="modal fade" id="allocate-teacher{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Allocating Mr. {{ $item->fname }} for ITP Subject</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="allocateSub">
                  {{ csrf_field() }}
                  <input type="text" name="id" class="form-control" value="{{ $item->id }}" hidden>
                  <input type="text" name="sub" class="form-control" value="<?php echo $subid; ?>" hidden>
                <div class="modal-body">
                
                    

                    <div class="form-group" >
                      <label for="inputGroupSelect01">Day:</label>
                      <select name='day' class="custom-select" id="inputGroupSelect01">
                        <option selected value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                      </select>
                    </div>


                     
                    <div class="form-group">
                      <label for="fee">Fee:</label>
                      <input type="text" name="fee" class="form-control" id="fee">
                    </div>
                    <div class="form-group">
                      <label for="year">year:</label>
                      <input type="text" name="year" class="form-control" id="year">
                    </div>
                    <div class="form-group">
                      <label for="time">Start Time:(24hr Format)</label>
                      <input type="text" name="starttime" class="form-control timepicker" id="starttime">
                    </div>
                    <div class="form-group">
                      <label for="time">End Time:(24hr Format)</label>
                      <input type="text" name="endtime" class="form-control timepicker" id="endtime">
                    </div>
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary allocate-teacher-button">Allocate</button>
                </div>
              </form>
              </div>
            </div>
          </div>
          @endforeach

          @foreach($teachers as $item)
          <div class="modal fade" id="error-modal{{ $item->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Absent</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Mr. {{ $item->fname }} Cannot Allocated due to Absent</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                </div>
              </div>
            </div>
          </div>
          @endforeach


          <div>
              <h1 class="text-center" style="font-size: 31px;">Teacher's Name</h1>
          </div>
          <div class="border rounded border-white shadow" id="Names">
              <div class="container">
                  <div class="row">
                      <form method="get" class="form-inline">
                        <div class="form-group mb-2">
                          <label for="search_text" class="sr-only">Search Teacher</label>
                          <input type="text" readonly class="form-control-plaintext" id="search_text" value="Search Teacher">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                          <label for="input_search" class="sr-only">Teacher's Name</label>
                          <input type="text" class="form-control" id="input_search" name="search_text" placeholder="Teacher's Name">
                        </div>
                        <input type="hidden" class="form-control" id="subid" name="subid" value="<?php echo $subid; ?>">
                        <button type="submit" class="btn btn-primary mb-2 search-button">Search</button>
                      </form>
                  </div>


                  @foreach($teachers as $item)
                  <div class="row">
                      <div class="col text-center teacher-wrapper">
                          <p class="text-center">{{ $item->fname }} {{ $item->lname }}</p>
                      </div>
                      @if( $item->status == '1')
                      <div class="col text-center teacher-wrapper"><a class="btn btn-primary" data-toggle="modal" data-target="#allocate-teacher{{ $item->id }}" role="button" href="">Allocate</a></div>
                      @else
                      <div class="col text-center teacher-wrapper"><a class="btn btn-primary teacher-absent-button" data-toggle="modal" data-target="#error-modal{{ $item->id }}" role="button" href="">Absent</a></div>
                      @endif
                  </div>
                  @endforeach


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

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script>
  $('.timepicker').timepicker({
    timeFormat: 'HH:mm ',
    interval: 30,
  
   
    defaultTime: '11',
    
    dynamic: false,
    dropdown: true,
    scrollbar: true,
    zindex: 2000
});
  </script>
</body>

</html>