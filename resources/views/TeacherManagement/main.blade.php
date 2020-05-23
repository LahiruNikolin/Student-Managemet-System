 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        		@yield('styles')
        <!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
        <!-- Styles -->
		<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">  

		<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-toggle.min.css')}}">  

		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Teachers</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/page01.css">
    <link rel="stylesheet" href="assets/css/page02.css">
    <link rel="stylesheet" href="assets/css/page02N-itp.css">
    <link rel="stylesheet" href="assets/css/styles.css">
		
		<script src="{{asset('js/jquery.js')}}" ></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="{{asset('../node_modules/chart.js/dist/Chart.bundle.js')}}"></script>
	 
	

    <title>Student Manager</title>
    
    <style>
 


    </style>
	 
</head>
<body>
	    <!-- header-->
	
<header>
		<div id='lil-hero'><span class="mr-2"  ><i class="fas fa-universal-access"></i></span>Student Manager</div>
		<div id='head-mid' class="d-flex justify-content-center">

			<button type="button" class="btn btn-primary m-1">
				Students <span class="badge badge-warning">47</span>
			  </button>

			  <button type="button" class="btn btn-primary m-1">
				Teachers <span class="badge badge-warning">12</span>
			  </button>

			  <button type="button" class="btn btn-primary m-1">
				Subjects <span class="badge badge-warning">9</span>
			  </button>
			  <button type="button" class="btn btn-primary m-1">
				Classes <span class="badge badge-warning">11</span>
			  </button>



		</div>
		<div id='admin-ic-area'>
			<span class="avatar"><i class="fas fa-user-alt"></i></span>
			<div class="d-flex justify-content-end  mt-3 mr-4">
				<div class="dropdown">
					<button class="btn btn-light dropdown-toggle"
							type="button" id="dropdownMenu1" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
                        Pamudi
					</button>
					<div class="dropdown-menu dropdown-menu-right" style=" " aria-labelledby="dropdownMenu1" data-container="body">
				 
                                    <a class="dropdown-item" href="#">New Admin</a>
                   
					  <a class="dropdown-item" href="#">Logout</a>
					   
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
						<span> <a href="{{url('StudentManagement_index')}}"> Students Management</a></span>
						<div class="lis-active"></div>
					</li>
					 
					<li><span  class="ic"><i class="fas fa-users"></i></span>
						<span> <a href="customer.html">Teacher Management</a></span>
						<div class="lis-active"></div>
					</li>

					<li><span class="ic"><i class="fas fa-lemon"></i></span>
						<span> <a href="{{asset('subject')}}"> Subject Management</a></span>
						<div class="lis-active"></div>
                    </li>
                    <li><span class="ic"><i class="fas fa-ticket-alt"></i></span>
						<span> <a href="{{url('External')}}"> External Staff Management</a></span>
						<div class="lis-active"></div>
					</li>
				 
					<li><span class="ic"><i class="fas fa-city"></i></span>
						<span> <a href="{{asset('payemntManagement')}}"> Payment Management</a></span>
						<div class="lis-active"></div>
					</li>
					<li><span class="ic"><i class="fas fa-file-invoice-dollar"></i></span>
						<span> <a href="{{asset('PaymentExpenses')}}"> Expenses Management</a></span>
						<div class="lis-active"></div>
			 
				</ul>
			</nav>
			
		</div>
		<div class="sub-main">
			<div class="container">

	
				
				@yield('content')
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