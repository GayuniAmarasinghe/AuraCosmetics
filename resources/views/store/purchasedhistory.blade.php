<!DOCTYPE html>
<html lang="en">

<head>
    @include('store.css')

<body>
    <!-- Topbar Start -->
    @include('store.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('store.sidebar')
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Purchased History</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Purchased History</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">

            <div >
                <table class="table table-bordered text-center mb-20">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Product Name</th>
                            <th>Product ID</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Delivery Status</th>
                            <th>Cancel Order</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle"> 
                        @foreach ($order as $order)
                        <tr>
                            <td class="align-middle"><img src="/products/{{($order->product_image)}}" alt="" style="width: 50px;"> {{$order->product_name}}</td>
                            <td class="align-middle"> {{$order->product_id}}</td>
                            <td class="align-middle"> {{$order->quantity}}</td>
                            <td class="align-middle">LKR {{$order->price}}.00</td>
                            <td class="align-middle"> {{$order->payment_method}}</td>
                            <td class="align-middle"> {{$order->status}}</td>
                            @if($order->status == 'pending')
                            <td class="align-middle"><a   class="btn btn-sm btn-primary" href="{{url('/cancel_order', $order->id)}}"><i class="fa fa-times"></i></a></td>
                            @else
                            <p></p>
                            @endif
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td class="align-middle"><img src="img/product-2.jpg" alt="" style="width: 50px;"> Colorful Stylish Shirt</td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr>
                        <tr>
                            <td class="align-middle"><img src="img/product-3.jpg" alt="" style="width: 50px;"> Colorful Stylish Shirt</td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr>
                        <tr>
                            <td class="align-middle"><img src="img/product-4.jpg" alt="" style="width: 50px;"> Colorful Stylish Shirt</td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">$150</td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    @include('store.footer')
    <!-- Footer End -->

    <!-- Back to Top -->

    @include('store.script')
</body>

</html>