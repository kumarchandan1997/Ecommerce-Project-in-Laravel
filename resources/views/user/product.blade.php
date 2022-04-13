
@if(session()->has('message'))

<div class="alert alert-success">
<button type="button" ></button> 

{{session()->get('message')}}

</div>

@endif

<div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Arrivals On Sale</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="#">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          @foreach($data as $product)



          

          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img height="300" width="150" src="/productimage/{{$product->image}}" alt=""></a>
              <div class="down-content">
              <a href="#"><h4>{{$product->title}}</h4></a>
              <h6>${{$product->price}}</h6>
                <p>{{$product->des}}</p>

                <!-- <a class="btn btn-danger" href="#"> Add Cart</a> -->
                <form action="{{url('addcart',$product->id)}}" method="post">
                 @csrf

                 <input type="number" value="1" min="1" class="form-control" style="width:100px" name="quantity">
                 <br>
                <input class="btn btn-danger" type="submit" value="Add Cart">
</form> 
                
                
              </div>
            </div>
          </div>
          @endforeach

         <div class="d-flex justify-content-center">
           {!! $data->links()!!}
</div>

        </div>
      </div>
</div>