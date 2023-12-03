
@extends('admin.admin')
@if(session('add_baner'))
    <script>
        alert('{{ session('add_baner') }}');
    </script>
@endif
@if(session('delete_baner'))
    <script>
        alert('{{ session('delete_baner') }}');
    </script>
@endif
@if(session('add_about'))
    <script>
        alert('{{ session('add_about') }}');
    </script>
@endif
<style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 90%;
      margin-top: 100px;
      margin-left: auto;
      margin-right: auto;
      height: 10%;
      background-color: #393c4b;
      
    } 
   

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 12px;
      height: 40px;
      width: 20px;
      
      
    }

    #customers tr:hover {background-color: #9fa0689e;}
    
    #customers th {    
    
      text-align:center;
      background-color: #04AA6D;
      color: white;
    }
    head
    {
        text-align: center;
    }
    body 
  {
      font-family: Arial, sans-serif;
      margin: 0;
      justify-content: center;
      align-items: center;
      height: 100vh;
  }
  .header
  {
      font-size: 20px;
      font-weight: bold;
      text-align: center;
  }
  label
  {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #000;
  }
  input 
  {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
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
      background-color: #00cc33;
  }
  .form-container 
  {
      max-width: 400px;
      margin: 0 auto;
      background-color: #3d929aa7;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      align: center;
  }
  .form-group button 
  {

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
@section('content')
<div class="container">
    <br>
    <h1 class="header">ABOUT SECTION </h1> 
    <br>
    <form action="{{route('upload.about')}}" method="post" class="form-container" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="form-group">
            <label >About Tiltle:</label>
            <input type="text"   name="title" placeholder="Write About">
        </div> 
        <div class="form-group">
            <label >About Description:</label>
            <input type="text"  name="desc" placeholder="Write Description" >
        </div>             
       
        <div class="form-group">
            <label >Facebook Link:</label>
            <input type="text"  name="facebook" placeholder="Write A Facebook Link" >
        </div> 
        <div class="form-group">
            <label >Youtube Link:</label>
            <input type="text"  name="youtube" placeholder="Write A Youtube Link" >
        </div> 
        <div class="form-group">
            <label >Header Image:</label>
            <input type="file"  name="header_image" required>
        </div>
        <div class="form-group">
            <label >Background Image:</label>
            <input type="file"  name="back_image" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Upload</button>                      
        </div>          
</form>
        <table id="customers">                 
            <tr>
              <th>ID</th> 
              <th>About Title</th>      
              <th>About Description</th>
              <th>Header Image</th>
              <th>Background Image</th>
              <th>Facebook</th>
              <th>Youtube</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>       
            @foreach ($data as $data )         
            <tr>         
              <td>{{ $data->id }}</td>
              <td>{{ $data->title}}</td>            
              <td>{{ Str::words($data->desc, 8)}}</td> 
              <td ><img style="width:100px; height: 70px;  object-fit: cover; " src="/headerimage/{{$data->header_image}}" alt="Image"></td> 
              <td ><img style="width:100px; height: 70px;  object-fit: cover; " src="/backgroundimage/{{$data->back_image}}" alt="Image"></td>  
              <td>{{$data->facebook}}</td>
              <td>{{Str::words($data->youtube , 5)}}</td>     
              <td><a class="btn btn-primary" href="{{route('edit.product' , $data->id)}}">Edit</a></td>    
              <td><a class="btn btn-danger" href="{{route('delete.baner' , $data->id)}}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
            </tr>
            @endforeach     
          </table>
        </div>
@endsection