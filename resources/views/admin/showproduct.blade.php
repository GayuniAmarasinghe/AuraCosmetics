<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Show Product</title>
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
            padding: 30px;
        }
        .text_color{
            color: black;
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

                @if(session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <div class="div_center">
                    <h2 class="h2_font">Show Product Details</h2>
                
                    <table class="center">
                        <tr class="th_color">
                            <th class="th_g">Product Name</th>
                            <th class="th_g">Image</th>
                            <th class="th_g">Description</th>
                            <th class="th_g">Category</th>
                            <th class="th_g">Stock</th>
                            <th class="th_g">Price</th>
                            <th class="th_g">Discount Price</th>
                            <th class="th_g">Edit</th>
                            <th class="th_g">Delete</th>
                        </tr>
                        @foreach($product as $product)
                        <tr>
                            <td>{{$product->product_name}}</td>
                            <td>
                                <img src="/products/{{($product->image)}}" style="height: 100px; width: 200px;">
                            </td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td>
                                <a href="{{url('/update_product/'.$product->id)}}" class="badge badge-outline-info">Edit</a>
                            <td>
                                <a href="{{url('/delete_product/'.$product->id)}}" class="badge badge-outline-danger" onclick="return confirm('Are you sure to Delete this')">Delete</a>
                            </td>
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