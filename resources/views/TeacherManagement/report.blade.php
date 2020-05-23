 
@extends('main')

 
@section('content')

<?php
$id=$_GET['id'];
?>
 

  <?php
    $day = DB::table('class')->distinct()->where('tid',$id)->get(['day']);
  ?>
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
 
    <div class="shadow" id="subjects">
        <div class="container">
            <div class="text-center">
                <h1>Report</h1>
            </div>
            <div id="table">
                <div class="container">
                    <div class="row text-center" id="row01">
                      <form action="print" method="get" class="form-group">
                        @csrf
                        <div class="col">
                          <input type="text" id="id" name="id" value="<?php echo $id; ?>" hidden>
                          <label class="form-control" for="cars">Choose Date:</label>
                          <select class="form-control" id="day" name="day">
                            @foreach($day as $d)
                            <option value="{{ $d->day }}">{{ $d->day }}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col">
                          <button type="submit" class="btn btn-primary after-add-subject-button" >Add</button>
                        </div>
                      </form>
                    </div>


                </div>
            </div>

        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    @stop
