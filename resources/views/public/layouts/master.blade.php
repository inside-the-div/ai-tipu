<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta name="author" content="John Doe">
	<meta name="developer" content="http://nasirkhan.me">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- fev-icon -->
	<link rel="shortcut icon" href="" />

	<!-- =================css file start=================== -->
	<!-- font awesome -->
	<link rel="stylesheet" href="{{URL::asset('font-end/css/all.css')}}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{URL::asset('font-end/css/bootstrap.min.css')}}">
	<!-- owl carasel slider css -->
	<link rel="stylesheet" href="{{URL::asset('font-end/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('font-end/css/owl.theme.default.min.css')}}">

	<!-- animate css -->
    <link rel="stylesheet" href="{{URL::asset('font-end/css/animate.min.css')}}">

    <!-- main css -->
    <link rel="stylesheet" href="{{URL::asset('font-end/css/default.css')}}">
    <link rel="stylesheet" href="{{URL::asset('font-end/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('font-end/css/responsive.css')}}">
	<!-- =================css file end=================== -->

	<!-- =================css file cdn start=================== -->

	<!-- font awesome cdn -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- Bootstrap CSS -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

	<!-- =================css file cdn end=================== -->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- ========================website title =======================-->
	@yield('title')
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	
	   <header>
	<!-- log and nav area -->
	    <div id="logo-and-nav" class="main-menu-logo bg-none">
	        <nav class="navbar navbar-expand-lg navbar-light">
	            <div class="container">
	              <a class="navbar-brand" href="/">কবিতা</a>
	              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	                <span class="navbar-toggler-icon"></span>
	              </button>
	              <div class="collapse navbar-collapse" id="navbarSupportedContent">
	                <ul class="navbar-nav ml-auto">
	                  <li class="nav-item ">
	                    <a class="nav-link @if(Request::is('poems')) active @endif" href="{{route('web-poem')}}">কবিতা</span></a>
	                  </li>

	                  <li class="nav-item ">
	                    <a class="nav-link @if(Request::is('storys')) active @endif" href="{{route('web-story')}}">গল্প</span></a>
	                  </li>             

	                  <li class="nav-item ">
	                    <a class="nav-link @if(Request::is('novels')) active @endif" href="{{route('web-novel')}}">উপন্যাস</span></a>
	                  </li>

	                  <li class="nav-item ">
	                    <a class="nav-link @if(Request::is('about')) active @endif" href="{{route('web-about')}}">আমার সম্পর্কে</span></a>
	                  </li>
	                  <li class="nav-item ">
	                    <a class="nav-link @if(Request::is('contact')) active @endif" href="{{route('web-contact')}}">যোগাযোগ</span></a>
	                  </li>
	                </ul>
	              </div>
	          </nav>
	      </div>
	   </header>

@if(Request::is('/'))
	<section id="hero">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="banner" style="background: url('{{Storage::url($setting->hero_image)}}');background-size: cover;" >
						<div class="banner-text text-center">
							<!-- <h1 class="font-33">ক্ষুদ্র করো না হে প্রভু আমার 
							হৃদয়ের পরিসর, <br>
							যেন সম ঠাঁই পায় 
							শত্রু-মিত্র-পর। </h1>
							<h2 class="font-26 mt-3">কাজী নজরুল ইসলাম</h2> -->

							{!!$setting->heading!!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endif

	<section id="content" class="section-margin-y-30">
		<div class="container">
			@yield('content')
		</div>
	</section>



	<footer>
		<div class="container">

			<div class="row">
				<div class="col-12 col-lg-4">
					<h3 class="font-23  py-2 mb-2 font-josefin">LOGO</h3>
					<ul>
						<li class="font-18 font-pt">Phone: +8801637017926</li>
						<li class="font-18 font-pt">Email: +8801637017926</li>
						<li class="font-18 font-pt">Address: +8801637017926</li>
					</ul>
				</div>

				<div class="col-12 col-lg-4 quick-links">
					<h3 class="font-23  py-2 mb-2 font-josefin">Quick Links</h3>
					<ul>
						<li><a class="font-pt" href="{{route('web-home')}}">Home</a></li>
						<li><a class="font-pt" href="{{route('web-about')}}">About</a></li>
						<li><a class="font-pt" href="{{route('web-contact')}}">Contact</a></li>
						<li><a class="font-pt" href="">Privacy</a></li>
					</ul>
				</div>


				<div class="col-12 col-lg-4 social-link">
					<h3 class="font-23  py-2 mb-2 font-josefin">Follow me</h3>
					<ul>
						<li><a class="font-16 transition-4" href="poem.html"><i class="fa fa-facebook"></i></a></li>
						<li><a class="font-16 transition-4" href="poem.html"><i class="fa fa-instagram"></i></a></li>
						<li><a class="font-16 transition-4" href="poem.html"><i class="fa fa-youtube"></i></a></li>
					</ul>
				</div>

			</div>




		</div>
	</footer>
	<div class="text-center copy-right">
		<p class="text-white font-16 font-josefin">CopyRight &copy; Nasir Khan || 2019</p>
	</div>

	<!--  jQuery js  -->
	 <script src="{{URL::asset('font-end/javascript/jquery.js')}}"></script>
	 <!-- Popper Js  -->
	 <script src="{{URL::asset('font-end/javascript/pooper.js')}}"></script>
	 <!-- Bootstrap 4 Js  -->
	 <script src="{{URL::asset('font-end/javascript/bootstrap.min.js')}}"></script>
	 <!-- particles 4 Js  -->
	 <!-- <script src="assets/js/particles.min.js"></script> -->
	 <!-- Tyoed 4 Js  -->
	 <!-- <script src="assets/js/typed.js"></script> -->
	 <!-- OWL Carousel JS  -->
	 <!-- <script src="assets/js/owl.carousel.min.js"></script> -->

	 <script src="{{URL::asset('font-end/javascript/custom.js')}}"></script>

	 @yield('custom-js')
</body>
</html>