<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.css')
    <style type="text/css">
        .title
        {
            color:white;
             padding-top: 25px;
              font-size: 25px; 
        }
        label
        {
            display:inline-block;
            width: 200px;
        }
        </style>
  </head>
  <body>
      
      <!-- This code is used to include sidebar and navbar from layouts -->
      @include('layouts.sidebar')
      @include('layouts.navbar')

      <div class="container-fluid page-body-wrapper">
          <div class="container" align="center">
          <h1 class="title">Add Product</h1>

          @if(session()->has('message'))

          <div class="alert alert-success">
          <button type="button" ></button> 
         
          {{session()->get('message')}}

      </div>

      @endif
          <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
           @csrf
          <div style="padding:15px;">
          <label>Product Title</label>
          <input style="color:black;" type="text" name="title" placeholder=" product title" required="">
           
                   @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif
    </div>
     
    <div style="padding:15px;">
          <label>Price</label>
          <input style="color:black;" type="number" name="price" placeholder="product price" required="">
                
                 @if ($errors->has('price'))
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                @endif
      </div>

    <div style="padding:15px;">
          <label>Description</label>
          <input style="color:black;" type="text" name="des" placeholder="product description" required="">
           
                      @if ($errors->has('des'))
                                    <p class="text-danger">{{ $errors->first('des') }}</p>
                                @endif
      </div>
    <div style="padding:15px;">
          <label>Quantity</label>
          <input style="color:black;" type="text" name="quantity" placeholder="enter quantity" required="">
                 
                    @if ($errors->has('quantity'))
                                    <p class="text-danger">{{ $errors->first('quatity') }}</p>
                                @endif
      </div>

    <div style="padding:15px;">
         
          <input type="file" name="image" >
    </div>

    <div style="padding:15px;">
        
          <input class="btn btn-success" type="submit" name="" >
    </div>
    </form>
   </div>
    </div>

      @include('layouts.script')
   
          <!-- partial -->
        
  </body>
</html>