@extends('admin.admin')

<style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 140%;
      margin-top: 100px;
      margin-left: auto;
      margin-right: auto;
      height: 30%;
      background-color: #393c4b;
      
    } 
   
    

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 5px;
      height: 40px;
      width: 20px;
      text-align: center;
      
    }

    #customers tr:hover {background-color: #68a0989e;}
    
    #customers th {    
    
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
    head
    {
        text-align: center;
    }
   
    </style>

@section('content')
        <table id="customers">             
            <tr>
            <th>Order Id</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Adress</th>              
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Status</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>       
            @foreach ($data as $data )     
            <tr>
                <td>{{ $data->oid }}</td>
                <td>{{ $data->user_name }}</td>         
                <td>{{ $data->user_phone }}</td>
                <td>{{ $data->user_email }}</td>  
                <td>{{ $data->user_address }}</td>  
                <td>{{ $data->product->title}}</td>
                <td>{{ $data->price}} Taka</td>
                <td>{{ $data->product_quantity}}</td>
                <td>{{ $data->total_amount}}</td>
                {{-- //<td>{{ Str::words($data->description, 8)}}</td>  --}}         
                <td >{{ $data->status}}</td>
                <td ><img style="width:200px; height: 80px;  object-fit: cover; " src="/productimage/{{$data->product->image}}" alt="Image"></td>       
                <td><a class="btn btn-primary" href="">Edit</a></td>    
                <td><a class="btn btn-danger" href="" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
            </tr>
            @endforeach     
          </table>
@endsection