<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Address Book</title>
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
            padding: 10px;
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
                    <h2 class="h2_font">Address Book</h2>

                    <table class="center">
                        <tr class="th_color">
                            <th class="th_g">Customer Name</th>
                            <th class="th_g">Customer Email</th>
                            <th class="th_g">Address</th>
                            <th class="th_g">Phone</th>
                            <th class="th_g">Gender</th>
                            <th class="th_g">ID</th>
                            <th class="th_g">Edit</th>
                            <th class="th_g">Delete</th>
                        </tr>

                        @foreach($address as $address)
                        <tr>
                            <td class="th_g">{{$address->name}}</td>
                            <td class="th_g">{{$address->email}}</td>
                            <td class="th_g">{{$address->address}}</td>
                            <td class="th_g">{{$address->phone}}</td>
                            <td class="th_g">{{$address->gender}}</td>
                            <td class="th_g">{{$address->id}}</td>
                            <td class="th_g"><a href="{{url('/edit_address/'.$address->id)}}">Edit</a></td>
                            <td class="th_g"><a href="{{url('/delete_address/'.$address->id)}}">Delete</a></td>
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