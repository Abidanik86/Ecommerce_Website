<nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="  nav-link" href="/">Home
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{route('view.all.product')}}">Our Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Contact Us</a>
          </li>                       
        <li class="nav-item">
            @if (Route::has('login'))
                @auth
                <li class="nav-item">
                  <a class="scroll-to-section {{ request()->routeIs('view.cart') ? ' active' : '' }} nav-link" href="{{route('view.cart',Auth::user()->id)}}">
                    <i class="fas fa-shopping-cart"></i>
                    Cart : [{{$count}}]</a>
                </li> 
               
                <x-app-layout>
                </x-app-layout>    
                @else
                
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
        </li>
        <li class="nav-item">             
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                @endauth
        </li>    
            @endif
        </ul>
      </div>
    </div>
  </nav>