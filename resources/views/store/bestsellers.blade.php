<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="secrion-title font-weight-bold font-color-white">BESTSELLERS</h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach($product as $product)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="products/{{$product->image}}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{$product->product_name}}</h6>
                    <div class="d-flex justify-content-center">
                        <h6>LKR {{$product->discount_price}}.00</h6><h6 class="text-muted ml-2"><del>LKR {{$product->price}}.00</del></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{url('view_product',$product->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-0 ml-0"></i>View Product</a>
                    <form action="{{url('add_cart', $product->id)}}" method="POST">
                        @csrf
                        <div class="row">
                            <i class="fas fa-shopping-cart text-primary mr-0 ml-5"></i><input type="submit" class="btn btn-sm text-dark p-0" value="Add To Cart">
                            {{-- <input type="number" name="quantity" class="border rounded ml-0 w-25 mr-0" value="1" min="1"> --}}
                        </div>
                        <div class="row ">
                            <input type="number" name="quantity" class="border rounded w-100 pl-2 pr-0  justify-content-right" value="1" min="1">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>