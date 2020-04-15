
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/page01.css">
    <link rel="stylesheet" href="assets/css/page02.css">
    <link rel="stylesheet" href="assets/css/page02N-itp.css">
    <link rel="stylesheet" href="assets/css/styles.css">
        <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">  

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-toggle.min.css')}}">  

    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="{{asset('../node_modules/chart.js/dist/Chart.bundle.js')}}"></script>
   
  @include('Inc.scannerImports')

    <title>Admin Panel</title>
    
    <style>
 


    </style>
   
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
        <a class="btn btn-primary" role="button" href="subject">Subject Management</a>
        <div class="border rounded border-white shadow" id="Names">
            <div class="container">
                <form method="post" action="addSubject">
                  {{ csrf_field() }}
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Subject Name:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="subjectName"  placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-5 col-form-label add-subject-category-wrapper">Subject Category:</label>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="subjectCategory" value="Normal" checked>
                        <label class="form-check-label" for="gridRadios1">
                          Normal Subject
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="subjectCategory" value="Special">
                        <label class="form-check-label" for="gridRadios2">
                          Special Subject
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="comment">Description:</label>
                    <textarea class="form-control" name="description" rows="5" id="description"></textarea>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10 add-subject-button-wrapper">
                      <button type="submit" class="btn btn-primary after-add-subject-button">Add</button>
                    </div>
                  </div>
                </form>
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