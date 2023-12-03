@extends('admin.admin')
<style>
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
@if(session('add_product'))
    <script>
        alert('{{ session('add_product') }}');
    </script>
@endif
@section('content')
      <div class="container">
        <br><br>
          <h1 class="header">ADD PRODUCT</h1> 
          <form action="{{route('upload.product')}}" method="post" class="form-container" enctype="multipart/form-data">
              @csrf
              @method('post')
              <div class="form-group">
                  <label >Product Tiltle:</label>
                  <input type="text"   name="title" placeholder="Write A Product Title">
              </div>
              <div class="form-group">
                  <label >Product Price:</label>
                  <input type="number"  name="price" placeholder="Write Product Price" >
              </div> 
              <div class="form-group">
                  <label >Product Description:</label>
                  <input type="text"  name="description" placeholder="Write Product Description" >
              </div>             
              <div class="form-group">
                  <label >Product Image:</label>
                  <input type="file"  name="image" required>
              </div>
              <div class="form-group">
                  <button class="btn btn-primary" type="submit">Upload</button>                      
              </div>          
      </form>
       </div> 
@endsection