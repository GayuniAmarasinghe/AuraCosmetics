<!DOCTYPE html>
<html>
    <head>
        <title>Category</title>
        @include('admin.css')

        <style type="text/css">
            .div_center{
                text-align: center;
                padding-top: 40px;
            }
            .h2_font{
                font-size: 40px;
                padding-bottom: 40px;
            }
            .input_color{
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
                           <h2 class="h2_font"> Add Category </h2>

                           <form action="{{url('/add_category')}}" method="POST">

                            @csrf
                             
                            <input type="text" class="input_color" name="category_name" placeholder="write a ctegory name">

                            <input type="submit" class="btn btn-primary" name="submit" value="Add Category">

                           </form>
                        </div>

                        <table class="center">
                            <tr>
                                <td>Category Name</td>
                                <td>Action</td>
                            </tr> 

                            @foreach($data as $data)
                            <tr>
                                <td>{{$data->category_name}}</td>
                                <td>
                                    <a href="{{url('delete_category',$data->id)}}" class="badge badge-outline-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </table>
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