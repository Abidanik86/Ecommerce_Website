

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<div class="latest-products" id="product-container">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="{{route('view.all.product')}}">view all products <i class="fa fa-angle-right"></i></a>     
            <form class="form-inline" action="{{route('search')}}" method="GET" style="float:right;">
              @csrf          
              <input class="form-control" type="text" name="search" placeholder="search" value="{{request('search')}}">
              <input type="submit"  value="Search" class="btn btn-success" >
            </form>      
          </div>
        </div>
        @foreach ($products as $product)  
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="/productimage/{{$product->image}}" alt=""></a>
            <div class="down-content">                  
              <a href="#"><h4>{{$product->title}}</h4></a>
              <h6>${{$product->price}}</h6>
              <p>{{$product->description}}</p>         
              <form action="{{route('add.cart' , $product->id)}}" method="POST">
                @csrf
                <input type="number" value="1" min="1" class="form-control" style="width:100px;" name="quantity" id="">
                <br>
                <input type="submit" class="btn btn-primary"  value="Add To Cart">
              </form>
            </div>
          </div>
        </div>        
        @endforeach    
      </div>
      @if(method_exists($products , 'links'))
      <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
    @endif
    </div>
  </div>

