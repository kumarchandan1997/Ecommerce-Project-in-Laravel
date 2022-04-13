<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.css')
  </head>
  <body>
      
      <!-- partial -->
      @include('layouts.sidebar')
      @include('layouts.navbar')

      <div class="container-fluid page-body-wrapper">
          <div class="container" align="center">
             
          <table>
          <tr style="background-color:grey;">
          <td style="padding:20px;">Custome Name</td>
          <td style="padding:20px;">Phone </td>
          <td style="padding:20px;">Address</td>
          <td style="padding:20px;">Product Title</td>
          <td style="padding:20px;">Price</td>
          <td style="padding:20px;">Quantity</td>
          <td style="padding:20px;">Status</td>
          <td style="padding:20px;">Action</td>

          </tr>
          @foreach($order as $orders)
          <tr align="center" style="background-color:black;">
          <td style="padding:20px;">{{$orders->name}}</td>
          <td style="padding:20px;">{{$orders->phone}}</td>
          <td style="padding:20px;">{{$orders->address}}</td>
          <td style="padding:20px;">{{$orders->product_name}}</td>
          <td style="padding:20px;">{{$orders->price}}</td>
          <td style="padding:20px;">{{$orders->quantity}}</td>
          <td style="padding:20px;">{{$orders->status}}</td>
          <td>
              <a class="btn btn-success" href="{{url('updatestatus',$orders->id)}}">Delivered</a>
</td>
          
</tr>
@endforeach



          </table>
</div>
</div>

      @include('layouts.script')
   
          <!-- partial -->
        
  </body>
</html>