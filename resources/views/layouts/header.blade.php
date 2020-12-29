<b class="screen-overlay"></b>
<div class="d-flex main-head">
	<div class="w-sm-25 d-flex justify-center align-center" style="flex-wrap: wrap;align-content: center;">		
		<img class="logo" src="{{ asset('img/logo.jpg') }}" width="">
	</div>
	<div class="d-flex flex-column w-100 ml-2">		
		<strong class="text-title" style="color:#2064a8; text-shadow:1px 0px 1px #67b1e6; padding:5pt; font-size: 17pt">Grand Plus College of Health Science and Technlogy, Ilorin</strong>
		<strong>...Advancing Health Innovation.</strong>	
	</div>
</div>
<nav class="navbar navbar-expand-md navbar-dark  mb-0 bg-primary1 d-flex justify-center p-0" style="border-radius: 0px !important;">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse w-100" id="main_nav">
	<ul class="navbar-nav mx-auto">
		<li class="nav-item {{(Route::current()->getName() == 'index' ? 'active': '')}}"> <a class="nav-link text-white" href="{{route('index')}}">Home </a> </li>
	    <li class="nav-item {{(Route::current()->getName() == 'about' ? 'active': '')}}"><a class="nav-link text-white" href="#">About</a></li>
	    <li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle  text-white" href="#" data-toggle="dropdown"> Administration</a>
		    <div class="dropdown-menu  bg-light" style="width: 200px !important">		    
			     <ul class="navbar-nav d-flex flex-column ">
			     	<li class="nav-item py-1"> <a class="nav-link text-primary1" href="#"> Governing Councils </a></li>
			     	<li class="nav-item py-1" ><a  class="nav-link text-primary1" href="#">Principal Officers</a></li>
			     </ul>
	         </div> 
	     </li>
	    <li class="nav-item {{(Route::current()->getName() == 'departments' ? 'active': '')}}  "><a class="nav-link text-white" href="{{route('departments')}}"> Departments </a></li>
	    <li class="nav-item dropdown {{(Route::current()->getName() == 'acdemics' ? 'active': '')}} ">
		    <a class="nav-link dropdown-toggle  text-white" href="#" data-toggle="dropdown"> Academics</a>
		    <div class="dropdown-menu  bg-light" style="width: 200px !important">		    
			     <ul class="navbar-nav d-flex flex-column ">
			     	<li class="nav-item py-1"> <a class="nav-link text-primary1" href="{{route('login')}}"> login </a></li>
			     	<li class="nav-item py-1"> <a class="nav-link text-primary1" href="{{route('apply')}}"> Registration </a></li>
			     	<li class="nav-item py-1" ><a  class="nav-link text-primary1" href="#">Admission</a></li>
			     </ul>
	         </div> 
	     </li>
	    
	    <li class="nav-item {{(Route::current()->getName() == 'news' ? 'active': '')}}"><a class="nav-link text-white" href="#"> News</a></li>
	    <!-- <li class="nav-item"><a class="nav-link" href="#"> Apply Online</a></li> -->
	    <li class="nav-item {{(Route::current()->getName() == 'portals' ? 'active': '')}}"><a class="nav-link text-white" href="#"> Portals	</a></li>
	<!-- 
		<li class="nav-item active"> <a class="nav-link" href="#">Home </a> </li>
		<li class="nav-item"><a class="nav-link" href="#"> About </a></li>
		<li class="nav-item"><a class="nav-link" href="#"> Services </a></li>
		<li class="nav-item dropdown has-megamenu">
		    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Mega menu  </a>
		    <div class="dropdown-menu megamenu">
			    
	              This is content of megamenu. <br>
		       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.
			        
	            </div> dropdown-mega-menu.// -->
		</li> 
	</ul>
  </div> <!-- navbar-collapse.// -->
</nav>

<!-- 
<button data-trigger="#navbar_main" class="d-lg-none btn btn-warning btn-primary1" type="button">  Show navbar </button>
<nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg navbar-dark bg-primary1 d-flex justify-center" style="border-radius: 0px !important;">
  <div class="offcanvas-header">  
    <button class="btn btn-light text-danger btn-close btn-danger1 float-right"> &times Close </button>
    <h5 class="py-2 text-white">Main navbar</h5>
  </div>
  <ul class="navbar-nav">
    
  </ul>
</nav> -->