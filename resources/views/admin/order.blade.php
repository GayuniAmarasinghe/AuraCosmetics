<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .h2_font{
            font-size: 30px;
            padding-bottom;
        }
        .th_color{
            background-color: #BB749A;
        }
        .th_g{
            padding: 6px;
            width: 100%;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 40px;
            border: 2px solid white;
            padding: 10px;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="div_center">
                    <h2 class="h2_font">Order Table</h2>

                    <table class="center">
                        <tr class="th_color">
                            <th class="th_g">Customer ID</th>
                            <th class="th_g">Customer Name</th>
                            <th class="th_g">Customer Email</th>
                            <th class="th_g">Address</th>
                            <th class="th_g">Phone</th>
                            <th class="th_g">Product Name</th>
                            <th class="th_g">Image</th>
                            <th class="th_g">Quantity</th>
                            <th class="th_g">Price</th>
                            <th class="th_g">Payment Method</th>
                            <th class="th_g">Status</th>
                            <th class="th_g">Delivered</th>
                        </tr>

                        @foreach($order as $order)
                        <tr>
                            <td class="th_g">{{$order->customer_id}}</td>
                            <td class="th_g">{{$order->customer_name}}</td>
                            <td class="th_g">{{$order->email}}</td>
                            <td class="th_g">{{$order->address}}</td>
                            <td class="th_g">{{$order->phone}}</td>
                            <td class="th_g">{{$order->product_name}}</td>
                            <td class="th_g">
                                <img src="/products/{{($order->product_image)}}" style="height: 50px; width: 100px;">
                            </td>
                            <td class="th_g">{{$order->quantity}}</td>
                            <td class="th_g">{{$order->price}}</td>
                            <td class="th_g">{{$order->payment_method}}</td>
                            <td class="th_g">{{$order->status}}</td>
                            @if($order->status == 'pending')
                            <td class="th_g"><a href="{{url('delivered', $order->id)}}" class="badge badge-outline-success">add</a></td>
                            @else
                            <p></p>
                            @endif
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>