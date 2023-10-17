<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Product</title>
    <base href="/public">
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
        .text_color{
            color: black;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
            padding: 10px;
        }
        label{
            display: inline-block;
            width: 100px;
            text-align: left;
            margin-bottom: 10px;
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
                    <h2 class="h2_font">Update Product</h2>

                    <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>Product Name</label>
                        <input type="text" name="product_name" placeholder="Product Name" class=" text_color"  required="" value="{{$product->product_name}}">
                    </div>

                    <div>
                        <label>Descrition</label>
                        <input type="text" name="description" placeholder="Description" class=" text_color" required="" value="{{$product->description}}">
                    </div>

                    <div>
                        <label>Category</label>
                        <select name="category" class=" text_color" required="">
                            <option value="{{$product->category}}" selected="">{{$product->category}}</option>

                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label>Quantity</label>
                        <input type="number" name="quantity" placeholder="Quantity"  min="0" class=" text_color" required="" value="{{$product->quantity}}">
                    </div>

                    <div>
                        <label>Product Price</label>
                        <input type="number" name="product_price" placeholder="Product Price" class=" text_color" required="" value="{{$product->price}}">
                    </div>

                    <div>
                        <label>Discount Price</label>
                        <input type="number" name="discount_price" placeholder="" class=" text_color" value="{{$product->discount_price}}">
                    </div>

                    <div>
                        <label> Current Image</label>
                        <img src="/products/{{($product->image)}}" style="height: 200px; width: 200px; margin: auto;">
                    </div>

                    <div>
                        <label> Change Image</label>
                        <input type="file" name="image" class=" text_color"  >
                    </div>

                    <div>
                        <input type="submit"  value="Edit Pruduct"  class="btn btn-primary" required="" >
                    </div>
                    </form>

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