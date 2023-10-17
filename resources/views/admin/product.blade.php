<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Product</title>
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
                    <h2 class="h2_font">Add Product</h2>

                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>Product Name</label>
                        <input type="text" name="product_name" placeholder="Product Name" class=" text_color"  required="">
                    </div>

                    <div>
                        <label>Descrition</label>
                        <input type="text" name="description" placeholder="Description" class=" text_color" required="">
                    </div>

                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class=" text_color" required="">
                    </div>

                    <div>
                        <label>Category</label>
                        <select name="category" class=" text_color" required="">
                            <option value="" selected="">Select Category</option>
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Quantity</label>
                        <input type="number" name="quantity" placeholder="Quantity"  min="0" class=" text_color" required="">
                    </div>

                    <div>
                        <label>Product Price</label>
                        <input type="number" name="product_price" placeholder="Product Price" class=" text_color" required="">
                    </div>

                    <div>
                        <label>Discount Price</label>
                        <input type="number" name="discount_price" placeholder="" class=" text_color">
                    </div>

                    <div>
                        <input type="submit"  value="Add Pruduct"  class="btn btn-primary" required="">
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