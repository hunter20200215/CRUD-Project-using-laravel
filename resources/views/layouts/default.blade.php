<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Theme Made By www.w3schools.com - No Copyright -->
	<title>@yield('title')</title>
	@include('includes.head')

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    @inject('categoryService', 'App\Services\CategoryService')
    @php
        $root_categories = $categoryService->rootCategories();
    @endphp
	<nav class="navbar navbar-default navbar-fixed-top">
	    @include('includes.header')
	</nav>

    @if (Route::has('home'))
    <div class="d-flex">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- carousel-indicators -->
		    @yield('carousel')
		</div>
	</div>

	<!-- Container (The Band Section) -->
	<div id="band" class="container text-center">
	    @yield('band')
	</div>

	<!-- Container (TOUR Section) -->
	<div id="tour" class="bg-1">
	  <div class="container">
	      @yield('tour')
	  </div>
	  
	  <!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	    
	        @yield('modal')
	    </div>
	  </div>
	</div>

	<!-- Container (Contact Section) -->
	<div id="contact" class="container contact">
	    @yield('contact')
	</div>

	<!-- Image of location/map -->
	<div> 
	    @yield('image')
	</div>
	@elseif (Route::has('pages/aboutus'))
	<div class="container-fluid bg-1 text-center">
		@yield('me')
    </div>

	<!-- Second Container -->
	<div class="container-fluid bg-2 text-center">
		@yield('web')
	</div>
	@endif
	<!-- Footer -->
	<footer class="fixed-bottom text-center">
	    @include('includes.footer')
	</footer>

</body>
</html>