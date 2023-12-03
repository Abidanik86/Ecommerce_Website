@extends('admin.admin')
@if(session('update_product'))
    <script>
        alert('{{ session('update_product') }}');
    </script>
@endif
@if(session('delete_product'))
    <script>
        alert('{{ session('delete_product') }}');
    </script>
@endif
<style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 80%;
      margin-top: 100px;
      margin-left: auto;
      margin-right: auto;
      height: 30%;
      background-color: #393c4b;
      
    } 
   
    

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
      height: 40px;
      width: 20px;
      
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
              <th>ID</th> 
              <th>Title</th>
              <th>Price</th>
              <th>Description</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>       
            @foreach ($data as $data )     
            <tr>         
              <td>{{ $data->id }}</td>
              <td>{{ $data->title}}</td>
              <td>$ {{ $data->price}} </td>
              <td>{{ Str::words($data->description, 8)}}</td> 
              <td ><img style="width:200px; height: 110px;  object-fit: cover; " src="/productimage/{{$data->image}}" alt="Image"></td>       
              <td><a class="btn btn-primary" href="{{route('edit.product' , $data->id)}}">Edit</a></td>    
              <td><a class="btn btn-danger" href="{{route('delete.product' , $data->id)}}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
            </tr>
            @endforeach     
          </table>
@endsection