<?php

$userType=auth::user()->role;

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		@yield('styles')
        <!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

 
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		
        <!-- Styles -->
		<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">  

		<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-toggle.min.css')}}">  


		
		<script src="{{asset('js/jquery.js')}}" ></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 
	 
 

    <title>Student Manager</title>
    
    <style>
 


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
						<span> <a href="{{asset('subject')}}"> Subject Management</a></span>
						<div class="lis-active"></div>
                    </li>
                    <li><span class="ic"><i class="fas fa-ticket-alt"></i></span>
						<span> <a href="ticket.html"> External Staff Management</a></span>
						<div class="lis-active"></div>
					</li>
					@if($userType=='p')
					<li><span class="ic"><i class="fas fa-city"></i></span>
						<span> <a href="{{asset('payemntManagement')}}"> Payment Management</a></span>
						<div class="lis-active"></div>
					</li>
					<li><span class="ic"><i class="fas fa-file-invoice-dollar"></i></span>
						<span> <a href="{{asset('home')}}"> Expenses Management</a></span>
						<div class="lis-active"></div>
					</li>
					@endif
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

<script src="{{asset('js/bootstrap-toggle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/all.js')}}"></script>
 
</body>

</html>