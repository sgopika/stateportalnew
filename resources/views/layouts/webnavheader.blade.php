<!-- <div class="container-fluid dochomepage"> -->
	<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
         <a href="#features">Skip to main content </a>
              @if($sessionbil==1)
                
                    <a class="getstarted scrollto"  id="mal">മലയാളം</a>
                
                @elseif($sessionbil==2)
                
                    <a class="getstarted scrollto"  id="eng">English</a>
               
                @endif
        
        
        	<!-- Dark mode switch -->
					<div class="modeswitch" id="darkModeSwitch">
						<div class="switch"></div>
					</div>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{url('/')}}" class="logo d-flex align-items-center"><img src="" alt="..." id="logoimg"></a>
      
      <nav id="navbar" class="navbar">
        <ul  id="mainmenus">
          <li><a class="nav-link scrollto active" href="{{url('/')}}" id="hometitle"></a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



	