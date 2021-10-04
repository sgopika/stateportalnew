<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>Kerala State Portal </title>
<meta name="description" content="State Portal Government of Kerala" />
<meta name="keywords" content="Kerala, Government, keralagov, KSITM, CDIT, PRD, Kerala government, Kerala CM,online services,offical webportal,kerala portal"/>
<meta name="author" content="Government of Kerala" />
<meta name="copyright" content="Government of Kerala" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="robots" content="follow"/>
<meta http-equiv="cache-control" content="no-cache"/>
<meta http-equiv="expires" content="0"/>
<meta name="Kerala-Gov-State-Portal" content="Kerala Gov State Portal">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image" href="{{ asset('assets/webassets/ssets/images/favicon.png') }}" />

<!-- ========================= CSS here ========================= -->
<link rel="stylesheet" href="{{ asset('assets/webassets/assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/webassets/assets/css/LineIcons.3.0.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/webassets/assets/css/tiny-slider.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/webassets/assets/css/glightbox.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/webassets/assets/css/main.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/video-js.css') }}" >
<link rel="stylesheet" href="{{ asset('assets/css/videojscity.css') }}" >
@if($sessionbil==2)
<link rel="stylesheet" href="{{ asset('assets/webassets/webfont/malfont.css') }}" />
@else
<link rel="stylesheet" href="{{ asset('assets/webassets/webfont/engfont.css') }}" />
@endif
<!-- <link rel="stylesheet" href="webfont/engfont.css" />  -->
</head>

<body class="malfont">

<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
<!-- /End Preloader -->

<!-- Start Header Area -->
	<header class="header navbar-area">
<!-- Start Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-4 col-md-4 col-12">
						<div class="top-left">
							<ul class="menu-top-link">
								<li>
									<div class="select-position">
										<input type="hidden" value="{{ $sessionbil }}">
										<select id="select5" class="lang">
											@if($sessionbil==1)
												<option value="1" id="mal" >മലയാളം</option>  
												<option value="0" id="eng" selected>English</option>
											@elseif($sessionbil==2)	
												<option value="1" id="mal" selected>മലയാളം</option>  
												<option value="0" id="eng" >English</option>
											@endif     
										</select>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
						<div class="top-middle">

						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-12 d-none d-sm-block">
						<div class="top-end">                            
							<ul class="user-login">
								<li><i class="lni lni-user"></i>&nbsp; <a aria-current="page" href="#main-content" id="skipcontent"></a></li>
								<!-- <li><a href="#">Sign In</a></li>
								<li><a href="#">Register</a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- End Topbar -->

<!-- Start Header Middle -->
		<div class="header-middle">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-8 col-md-6 col-12">
						<!-- Start Header Logo -->
						<a class="navbar-brand" href="{{url('/')}}">
							<img src="{{ asset('assets/webassets/assets/images/logo/logo.png') }}" alt="Logo" id="logoimg">
						</a>
						<!-- End Header Logo -->
					</div>
					<div class="col-lg-4 col-md-6 d-xs-none">
						<!-- Start Main Menu Search -->
						<div class="main-menu-search">
							<!-- navbar search start -->
						<form  action="{{ route('search') }}" method="POST" >	
							 @csrf
							<div class="navbar-search search-style-5">
								<div class="search-input">
									<input class="search_input" type="text" placeholder="Search" id="searchdata" name="searchdata">
								</div>
								<div class="search-btn">
									<button ype="submit"><i class="lni lni-search-alt"></i></button>
								</div>
							</div>
							<!-- navbar search Ends -->
						</form>		
						</div>
						<!-- End Main Menu Search -->
					</div>
				</div>
			</div>
		</div>
<!-- End Header Middle -->

<!-- Start Header Bottom -->
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-8 col-md-6 col-12">
					<div class="nav-inner">

						<!-- Start Navbar -->
						<nav class="navbar navbar-expand-lg">
							<button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
								data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation">
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
								<ul id="nav" class="navbar-nav ms-auto mainmenus">
									<li class="nav-item"><a href="{{url('/')}}" class="active" aria-label="Toggle navigation" id="homelbl"></a></li>
									
								</ul>
							</div> <!-- navbar collapse -->
						</nav>
						<!-- End Navbar -->
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">

					<!-- Start Nav Social -->
					<div class="nav-social">
						<!-- <h5 class="title" id="followus"></h5>
						<ul id="socialmedia"> 
							
							
						</ul> -->
					</div>
					<!-- End Nav Social -->
				</div>
			</div>
		</div>
		<!-- End Header Bottom -->
	</header>
<!-- End Header Area -->