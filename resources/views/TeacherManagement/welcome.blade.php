@extends('main')

 
@section('content')
<style>
.text-center {
  margin-top: 30px;
}

#Names {
  margin-top: 70px;
  margin-left: 90px;
  margin-right: 90px;
  padding: 70px;
}

#Names {
  /*border: 1px solid gray;*/
  /*border-radius: 8px;*/
}
#row01 {
  margin-top: 30px;
}

#row02 {
  margin-top: 20px;
}

#row03 {
  margin-top: 20px;
}

#subjects {
  margin-top: 50px;
  margin-left: 120px;
  margin-right: 120px;
  padding: 40px;
}

.btn.btn-primary {
  margin-top: 20px;
  margin-left: 20px;
}

.h5, h5 {
  /*margin-left: 60px;*/
  margin-top: 30px;
}

#presentAllocation {
  margin-left: 50px;
}

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
 

 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('success'))
      <script>
      swal({
        // title: "Good job!",
        text: "Teacher Deleted Successfully",
        icon: "warning",
        button: "OK!",
      });
    </script>
@endif
  <?php
    $teacher = DB::table('teacher')->get();
   //dd(  $teacher);
   //$teacher = $teacher[0];


   
  ?>
  @foreach($teacher as $t)
 
      <div class="modal fade" id="delete-modal{{ $t->tid }}" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Teacher</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Do you wanna delete ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <form action="deleteTeacher" method="POST">
              {{ csrf_field() }}
              <input type="text" value="{{ $t->tid }}" name="id" hidden>
              <button type="submit" class="btn btn-primary error-modal">Yes</button>
          </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach
    <div class="shadow" id="subjects">
        <div class="container">
            <div class="text-center">
                <h1>Teachers</h1>
            </div>
            <div id="table">
                <div class="container">
                    <div class="row text-center" id="row01">
                        <div class="col">
                            <h5 class="text-center">Teachers Name</h5>
                        </div>
                        <div class="col"></div>
                        <div class="col"></div>
                    </div>

                    @foreach($teacher as $t)
                    <div class="row text-center" id="row02">
                        <div class="col">
                            <p class="text-center">{{ $t->fname }}</p>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary subject-allocate-button-edit" role="button" href="view-teacher?id={{ $t->tid }}">View</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary subject-allocate-button-delete" data-toggle="modal" data-target="#delete-modal{{ $t->tid }}" role="button" href="">Delete</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary subject-allocate-button-info"  role="button" href="report?id={{ $t->tid }}">Report</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <a class="btn btn-primary before-add-subject-button" role="button" href="add-teacher">Add Teacher</a>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
 
@stop