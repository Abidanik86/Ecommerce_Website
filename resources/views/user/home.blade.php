@include('user.pop_up')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
@foreach ($logo as $logo )
@endforeach
<!-- ***** Font Page Title ***** -->
    <title>{{$logo->logo_title}}</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>
  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="/">
             <!-- ***** Logo ***** -->
          <img style="width:150px; height: 70px;  object-fit: cover;" src="/logoimage/{{$logo->image}}" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{route('view.all.product')}}">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}">About Us</a>
              </li>                           
            <li class="nav-item">
                @if (Route::has('login'))
                    @auth                  
                    <li class="nav-item">
                      <a class="scroll-to-section {{ request()->routeIs('view.cart') ? ' active' : '' }} nav-link" href="{{route('view.cart',Auth::user()->id)}}">
                        <i class="fas fa-shopping-cart"></i>
                        Cart:[{{$count}}]</a>
                    </li>                     
                    <li class="nav-item">
                      <a class="scroll-to-section {{ request()->routeIs('view.order') ? ' active' : '' }} nav-link" href="{{route('view.order',Auth::user()->id)}}">
                        <i class="fas fa-shopping-bag"></i>
                        Order's</a>
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
    </header>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
   
   
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        @foreach ($baner as  $baner)
        <div class="banner-item">
          <img src="/banerimage/{{$baner->image}}" alt="">
          <div class="text-content">
            <h4>{{$baner->title}}</h4>
            <h2>{{$baner->desc}}</h2>
          </div>     
        </div>
        @endforeach
      </div>
    </div>
   
    <!-- Banner Ends Here -->
    <!--Latest Product Start Here -->
    @include('user.product')
    <!--Latest Product Ends Here -->
    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          @foreach ($about as  $about)
           @endforeach
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Background</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="/backgroundimage/{{$about->back_image}}" alt="">
            </div>
          </div>
        
          <div class="col-md-6">
            <div class="left-content">
              <h4>{{$about->title}}</h4>
              <p>{{$about->desc}}</p>
              <ul class="social-icons">
                <li><a href="{{$about->facebook}}"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{$about->youtube}}"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>   
      </div>
    </div>
 @foreach ($footer  as $footer )  
 @endforeach
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; {{$footer->name}}
            
            - Design By: <a rel="nofollow noopener" href="https://www.facebook.com/Abidanik86/" target="_blank">{{$footer->design}}</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
@if(session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
  </body>
</html>
