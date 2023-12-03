
<style>
    body 
    {
        font-family: Arial, sans-serif;
        margin: 0;
        justify-content: center;
        align-items: center;
        height: 110vh;
    }
    .header
    {
        font-size: 50px;
        font-weight: bold;
        text-align: center;
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
        background-color: #cc0000;
    }
    .form-container 
    {
        max-width: 400px;
        margin: 0 auto;
        background-color: #3d929aa7;
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
    <x-app-layout>     
    </x-app-layout>
    <!DOCTYPE html>
     <html lang="en">
      <head>
        <title>Amdin</title>
      </head>
      <body>
        <div class="container-scroller">
            <div class="container">
                <h1 class="header">Edit Product Item</h1>
                <form action="{{route('update.product' , $data->id)}}" method="post" class="form-container" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label >PRODUCT TITLE:</label>
                        <input type="text"   name="title"  value="{{$data->title}}">
                    </div>
                    <div class="form-group">
                        <label >PRODUCT PRICE:</label>
                        <input type="num"  name="price" value="  {{$data->price}}" required>
                    </div>
                    <div class="form-group">
                        <label >PRODUCT DESCRIPTION:</label>
                        <input type="text"  name="description" value="{{$data->description}}" required>
                    </div>
                    <div class="form-group">
                        <label >PRODUCT IMAGE:</label>
                        <input type="file"  name="image" value="{{asset($data->image)}}" >
                    </div>
                   
                    <div class="form-group">
                        <button type="submit">Update</button>
                        <a style="color: #cc0000; " href="javascript:history.back()">Cancel</a></button>     
                    </div>
            </form>
        </div> 
        <!-- End custom js for this page -->
      </body>
    </html>
    
