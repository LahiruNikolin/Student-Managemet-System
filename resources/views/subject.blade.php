<?php

$userType=auth::user()->role;

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
              if (isset($_GET["search_text"])) {
                    $special = DB::table('subject')->where('subjectCategory','Special')->where('subjectName', 'like', '%' .  $_GET["search_text"] . '%')->get();
                    $normal = DB::table('subject')->where('subjectCategory','Normal')->where('subjectName', 'like', '%' .  $_GET["search_text"] . '%')->get();          
              } else {
                $special = DB::table('subject')->where('subjectCategory','Special')->get();
                $normal = DB::table('subject')->where('subjectCategory','Normal')->get();
              }
            $subject = DB::table('subject')->get();
          ?>

            @foreach($subject as $item)
            <div class="modal fade" id="delete-modal{{ $item->id }}" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <form method="post" action="deleteSub">
                  {{ csrf_field() }}
                  <input type="text" readonly class="form-control-plaintext" name="id" value="{{ $item->id }}" hidden>
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Delete subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Do you wanna delete?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" onclick="window.location='page01.html';" class="btn btn-primary error-modal">Yes</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
            @endforeach

            <div>
                <h2 class="text-center">Subject Management</h2>
            </div>
            <div class="shadow" id="subjects">
                <div class="container">
                    <div class="row">
                        <form method="get" class="form-inline">
                          <div class="form-group mb-2">
                            <label for="search_text" class="sr-only">Search Subject</label>
                            <input type="text" readonly class="form-control-plaintext" id="search_text" value="Search Subject">
                          </div>
                          <div class="form-group mx-sm-3 mb-2">
                            <label for="input_search" class="sr-only">Subject Name</label>
                            <input type="text" class="form-control" id="input_search" name="search_text" placeholder="Enter subject name here">
                          </div>
                          <button type="submit" class="btn btn-primary mb-2 search-button">Search</button>
                        </form>
                    </div>




                    <table style="width:100%">
                      <tr>
                        <th><h4 class="text-center">Normal Subjects</h4></th>
                        <th><h4 class="text-center">Special Subjects</h4></th>

                      </tr>

                      <tr>
                        <td>
                          <table style="width:100%">
                            @foreach($normal as $item)
                            <tr>
                              <th>
                                <div class="row" id="row01">
                                    <div class="col">
                                        <p class="text-center">{{ $item->subjectName }}</p>
                                    </div>
                                    <div class="col"><a class="btn btn-primary text-center" role="button" style="width: 102px;height: 38px;" href="allocate?id={{ $item->id }}&type=Normal">Allocate</a></div>
                                    <div class="col">
                                        <a class="btn btn-primary subject-allocate-button-edit" role="button" href="edit-subject?id={{ $item->id }}">Edit</a>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-primary subject-allocate-button-delete" data-toggle="modal" data-target="#delete-modal{{ $item->id }}" role="button" href="">Delete</a>
                                    </div>

                                </div>
                              </th>
                            </tr>
                            @endforeach

                          </table>
                        </td>
                        <td>
                          <table style="width:100%">
                            @foreach($special as $item)
                            <tr>
                              <th>
                                <div class="row" id="row01">
                                    <div class="col">
                                        <p class="text-center">{{ $item->subjectName }}</p>
                                    </div>
                                    <div class="col"><a class="btn btn-primary text-center" role="button" style="width: 102px;height: 38px;" href="allocate?id={{ $item->id }}&type=Special">Allocate</a></div>
                                    <div class="col">
                                        <a class="btn btn-primary subject-allocate-button-edit" role="button" href="edit-subject?id={{ $item->id }}">Edit</a>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-primary subject-allocate-button-delete" data-toggle="modal" data-target="#delete-modal{{ $item->id }}" role="button" href="">Delete</a>
                                    </div>
                                </div>
                              </th>
                            </tr>
                            @endforeach
                          </table>
                        </td>

                      </tr>

                    </table>


                </div>
                <div class="row">
                    <a class="btn btn-primary before-add-subject-button" role="button" href="add-subject">Add Subject</a>
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