@include('user.pop_up')
<style>
    body {
        font-family: Arial, sans-serif;
            margin: 0;
            justify-content: center;
            align-items: center;
            height: 110v
    }

    h1 {
    text-align: center;
    font-size: 50px;

    }

    .cart-container {
    margin: 20px auto;
    max-width: 100%;
    padding: 80px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    }

    table, th, td {
    border: 1px solid #ddd;
    }

    th, td {
    padding: 10px;
    text-align: center;
    }

    th {
    background-color: #f2f2f2;
    }

    .cart-summary {
    text-align: right;
    }

    .cart-summary p {
    font-weight: bold;
    }

    .cart-summary a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    margin-top: 10px;
    }

    .cart-summary a:hover {
    background-color: #0056b3;
    }



    body 
    {
        font-family: Arial, sans-serif;
        margin: 0;
        justify-content: center;
        align-items: center;
        height: 110vh;
    }

    label
    {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
    input 
    {
        width: 100%;
        padding: 8px;
        border: 1px solid #c20000;
        border-radius: 5px;
        color: rgb(0, 0, 0); 
    } 
    input[type="text"],input[type="email"],input[type="password"] 
    {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ffffff;
        border-radius: 4px;   
    }
    input[type="submit"] 
    {
        background-color: #4caf50;
        color: #fff;
        padding-bottom: 50px;
        padding: 10px 20px;
        text-align: center;
        border: none;
        border-radius: 4px;
        cursor: pointer; 
    }
    .form-group button:hover 
    { 
        background-color: rgb(197, 77, 77);
    }
    .form-container 
    {
        max-width: 400px;
        margin: 0 auto;
        background-color: rgba(185, 163, 202, 0.655);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-group button 
    {
        background-color: #4caf50;
        color: #fff;
        position: relative; 
        padding: 10px 20px;
        text-align: center;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .form-group 
    {
        margin-bottom: 20px;
    }
    input[type="text"],input[type="num"]
    {
        color: rgb(0, 0, 0); /* Change 'blue' to the desired color */
    }
    
</style>

<!DOCTYPE html>

<html lang="en"> 
  <head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <meta name="description" content="">
    <base href="/public">
    <meta name="author" content=""> 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>  
    <title>{{ Auth::user()->name }} : CART ITEM'S</title>
    <br>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css"> 
    </head>  
    <body>
    <!-- ***** Preloader Start ***** -->   
    <!-- ***** Preloader End ***** -->
    <!-- ***** Header Area Start ***** -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <a class="navbar-brand" href="/">
                @foreach ($header as $logo )
                @endforeach
                <img style="width:150px; height: 70px;  object-fit: cover;" src="/logoimage/{{$logo->image}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                  <a class="nav-link" href="/">Home
                  </a>
                </li> 
              <li class="nav-item">
                  @if (Route::has('login'))
                      @auth
                      <li class="nav-item">
                        <a class="scroll-to-section {{ request()->routeIs('view.cart') ? ' active' : '' }} nav-link" href="{{route('view.cart',Auth::user()->id)}}">
                          <i class="fas fa-shopping-cart"></i>
                          Cart : [{{$count}}]</a>
                      </li> 
                      <li class="nav-item ">
                        <a class="scroll-to-section {{ request()->routeIs('view.order') ? ' active' : '' }} nav-link" href="{{route('view.order',Auth::user()->id)}}">               
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
    <div class="cart-container">
        <h1 >Shopping Cart</h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>         
            <tbody  class="form-container" >
                @foreach ($data  as  $data)
                <form action="{{route('order.product')}}" method="post" class="">
                    @csrf
                    @method('post')
                <!-- Loop through your cart items here -->   
                    <tr> 
                        <td>  
                            <input type="text" name="product_name[]" value="{{$data->title}}" hidden="" > 
                            {{$data->title}}
                        </td>
                        <td>  
                            <img style="width:200px;" src="productimage/{{$data->image}}" alt="">
                        </td>
                        <td>
                            <input type="integer" name="product_price[]" value="{{$data->price}}" hidden="">
                            ${{$data->price}}
                        </td>
                        <td>
                            <input type="integer" name="product_quantity[]" value="{{$data->quantity}}" hidden="" >{{$data->quantity}}
                        </td>
                        <td>
                            <input type="integer" name="total_amount[]" value="{{$data->total}}" hidden ="">${{$data->total}}
                        </td>    
                     <td>
                         <a type="button" href="{{route('delete.cart' , $data->cid)}}" class="btn btn-danger" onclick="return confirm('Are you Sure You Want To Delete This Cart Item?')" >Remove</a>
                    </td>                       
                    </tr>
                    @endforeach                     
               </tbody>
        </table>
        <div class="cart-summary">
            <p>Total: {{$total}}$</p>
            <a id="checkout">Proceed to Checkout</a>
        </div>
        <div id="appear" style="display: none;">
            <div class="form-container">          
                @foreach ($info as  $info)
                @endforeach
                <div class="form-group" >
                    <label >NAME:</label>
                        <input type="text"   name="user_name"  value="{{$info->name}}">
                </div>
                <div class="form-group">
                    <label >PHONE:</label>
                        <input type="text"   name="user_phone"  value="">
                </div>
                <div class="form-group">
                    <label >EMAIL:</label>
                        <input type="text"   name="user_email"  value="{{$info->email}}">
                </div>
                <div class="form-group">
                    <label >ADDRESS:</label>
                        <input type="text"   name="user_address"  value="">
                </div>  
                    <td>
                        <input type="text" name="payment_method" value="cash_on_delivery" hidden ="">
                    </td>        
                <div style="margin-top: 30px; font-size: 19px; font-weight: bold; color: green;">
                    <tr>Total Ammount :</tr>
                    <td >{{$total}}$</td>
                </div>
                <div class="form-group">
                    <label for="payment_method">Select Payment Method:</label>
                    <select class="" id="payment_method">
                        <option value="cash_on_delivery">Cash on Delivery</option>
                    </select>
                </div>
               
                <div class="form-group">
                    <button type="submit">ORDER NOW</button>
                    <a style="padding: 10px; font-size:25px; color: rgb(255, 0, 0)" href="{{route('view.cart',Auth::user()->id)}}" >Cancel</a>    
                </div>   
            </div>
        </form>
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
      <!-- jQuery -->
      <script src="assets/js/jquery-2.1.0.min.js"></script>
      <script>
        $("#checkout").click(
        function(){
            $("#appear").show();
        }
        );
      </script>
      <!-- Bootstrap -->
      <script src="assets/js/popper.js"></script>
      <script src="assets/js/bootstrap.min.js"></script> 
      <!-- Plugins -->
      <script src="assets/js/owl-carousel.js"></script>
      <script src="assets/js/accordions.js"></script>
      <script src="assets/js/datepicker.js"></script>
      <script src="assets/js/scrollreveal.min.js"></script>
      <script src="assets/js/waypoints.min.js"></script>
      <script src="assets/js/jquery.counterup.min.js"></script>
      <script src="assets/js/imgfix.min.js"></script> 
      <script src="assets/js/slick.js"></script> 
      <script src="assets/js/lightbox.js"></script> 
      <script src="assets/js/isotope.js"></script>    
      <!-- Global Init -->
      <script src="assets/js/custom.js"></script>
      <script>
          $(function() {
              var selectedClass = "";
              $("p").click(function(){
              selectedClass = $(this).attr("data-rel");
              $("#portfolio").fadeTo(50, 0.1);
                  $("#portfolio div").not("."+selectedClass).fadeOut();
              setTimeout(function() {
                $("."+selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
              }, 500);
                  
              });
          });
      </script>
 </body>
</html>
