 
@extends('main')

 
@section('content')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Session::has('success'))
      <script>
      swal({
        title: "Good job!",
        text: "New Teacher Added Successfully",
        icon: "success",
        button: "OK!",
      });
    </script>
@endif
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
 
    <a class="btn btn-primary" role="button" href="{{url('/')}}">Back</a>
    <div>
        <h1 class="text-center" style="font-size: 31px;">Add Teacher</h1>
    </div>
    <div class="border rounded border-white shadow" id="Names">
        <div class="container">
            <form action="addTeacher" method="POST">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="inputFirstName" class="col-sm-2 col-form-label">First Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="fname">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputLastName" class="col-sm-2 col-form-label">Last Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="lname">
                  </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
                  </div>
              </div>
              <div class="form-group row">
                <label for="inputAddress" class="col-sm-2 col-form-label">Address:</label>
                  <div class="col-sm-10">
                    <input type="address" class="form-control" id="inputAddress" placeholder="Address" name="address">
                  </div>
              </div>
              <div class="form-group row">
                <label for="inputAge" class="col-sm-2 col-form-label">Age:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputAge" placeholder="Age" name="age">
                  </div>
              </div>
              <div class="form-group row">
                <label for="inputQualification" class="col-sm-2 col-form-label">Qualification:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputQualification" placeholder="Qualification" name="qualification">
                  </div>
              </div>
              <div class="form-group row">
                <label for="inputJoinDate" class="col-sm-2 col-form-label">Join Date:</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputJoinDate" name="joinDate">
                  </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10 add-subject-button-wrapper">
                  <button type="submit" class="btn btn-primary after-add-subject-button" >Add</button>
                </div>
              </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
 
 
    @stop