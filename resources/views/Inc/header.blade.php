<?php
use Illuminate\Support\Facades\DB;
use App\Student;
use App\subject;
use App\teacher;
use App\tution;

$students=Student::all();
$subs=subject::all();
$teachers=teacher::all();
$classes=tution::all();

$stCount=count($students);
$subCount=count($subs);
$tCount=count($teachers);
$clzCount=count($classes);
?>


<header>
		<div id='lil-hero'><span class="mr-2"  ><i class="fas fa-universal-access"></i></span>Student Manager</div>
		<div id='head-mid' class="d-flex justify-content-center">
		 
			<button type="button" class="btn btn-primary m-1">
				Students <span class="badge badge-warning"><?php echo $stCount;?></span>
			  </button>

			  <button type="button" class="btn btn-primary m-1">
				Teachers <span class="badge badge-warning"><?php echo $tCount;?></span>
			  </button>

			  <button type="button" class="btn btn-primary m-1">
				Subjects <span class="badge badge-warning"><?php echo $subCount;?></span>
			  </button>
			  <button type="button" class="btn btn-primary m-1">
				Classes <span class="badge badge-warning"><?php echo $clzCount;?></span>
			  </button>



		</div>
		<div id='admin-ic-area'>
			<span class="avatar"><i class="fas fa-user-alt"></i></span>
			<div class="d-flex justify-content-end  mt-3 mr-4">
				<div class="dropdown">
					<button class="btn btn-light dropdown-toggle"
							type="button" id="dropdownMenu1" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
 
					  {{auth::user()->name}}
					</button>
					<div class="dropdown-menu dropdown-menu-right" style=" " aria-labelledby="dropdownMenu1" data-container="body">
					@if($userType=='p')
									<a class="dropdown-item" href="{{url('adminArea')}}">{{ __('Manage') }}</a>
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('New Admin') }}</a>
					@endif
					  <a class="dropdown-item" href="{{asset('/logout')}}">Logout</a>
					   
					</div>
				  </div>
			</div>
			 
		</div>
	</header>