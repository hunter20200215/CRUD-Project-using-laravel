<div class="container-fluid">
    <div class="w3-sidebar w3-bar-block w3-border-right container-fluid" style="display:none;;" id="mySidebar">
      <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
      <a href="#" class="w3-bar-item w3-button">Link 1</a>
      <a href="#" class="w3-bar-item w3-button">Link 2</a>
      <a href="#" class="w3-bar-item w3-button">Link 3</a>
    </div>
    <div class="navbar-header">
      <button class="w3-button w3-teal w3-xlarge w3-dark-grey" onclick="w3_open()" style="height: 55px;color: lightgrey;">☰</button>
      <a class="navbar-brand" href="#myPage">Category</a>
    </div>
    @foreach($root_categories as $root_category)
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="font-size: 13px">{{ $root_category->title }}
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @foreach($root_category->sub_categories as $sub_category)
            <li><a href="blog">{{$sub_category->title}}</a></li>
            @endforeach
          </ul>
        </li>  
      </ul>
    </div>
    @endforeach
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home">HOME</a></li>
        <li><a href="#band">BAND</a></li>
        <li><a href="#tour">TOUR</a></li>
        <li><a href="#contact">BLOG</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">OtherPage
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="contactus">contactus</a></li>
            <li><a href="aboutus">aboutus</a></li>
            <li><a href="faqs_page">fage_page</a></li>
            <li><a href="blog">blog</a></li> 
          </ul>
        </li>
        <li>
        	@guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                      <li>
                          <a class="dropdown-item" href="{{ route('admin.posts.index') }}">Post</a>
                      </li>
                    	<li>
	                        <a class="dropdown-item" href="{{ route('logout') }}"
	                           onclick="event.preventDefault();
	                                         document.getElementById('logout-form').submit();">
	                            {{ __('Logout') }}
	                        </a>
	                    </li>
	                  </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </div>
                </li>
            @endguest
        </li>
      </ul>
    </div>
  </div>
