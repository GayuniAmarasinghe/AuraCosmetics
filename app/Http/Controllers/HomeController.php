<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{

    public function index()
    {
        $product = Product::all();
        return view('store.home', compact('product'));
    }
    

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {

            $total_products = Product::all()->count();
            $total_orders = Order::all()->count();
            $total_customers = User::all()->count();
            $order = Order::all();
            $total_revenue = 0;

            foreach ($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = Order::where('status', 'delivered')->get()->count();
            $total_pending = Order::where('status', 'pending')->get()->count();

            return view('admin.home' , compact('total_products', 'total_orders', 'total_customers', 
            'total_revenue', 'total_delivered', 'total_pending'));
        } else {
            $product = Product::all();
            return view('store.home' , compact('product'));
        }
    }

    public function home()
    {
        $product = Product::all();
        return view('store.home', compact('product'));
    }

    public function shop()
    {
        $product = Product::all();
        return view('store.shop', compact('product'));
    }

    public function view_product($id)
    {
        $product = Product::find($id);
        return view('store.viewproduct' , compact('product'));
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
           $customer=Auth::user();
           $product=Product::find($id);  
           
           $cart=new Cart;

            $cart->product_id=$product->id;
            $cart->product_name=$product->product_name;
            $cart->product_image=$product->image;
            $cart->quantity=$request->quantity;
            $cart->price=$product->discount_price * $request->quantity;
            $cart->customer_id=$customer->id;
            $cart->customer_name=$customer->name;
            $cart->email=$customer->email;
            $cart->phone=$customer->phone;
            $cart->address=$customer->address;
    
            $cart->save();
    
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::id();
            $cart=Cart::where('customer_id',$id)->get();
            return view('store.cart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
    
    }

    public function remove_cart($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function checkout()
    {
        if(Auth::id())
        {
            $id=Auth::id();
            $cart=Cart::where('customer_id',$id)->get();
            return view('store.checkout',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cash_order(Request $request)
    {
        $customer=Auth::user();
        $data=Cart::where('customer_id',$customer->id)->get();

        foreach($data as $data)
        {
            $order=new Order;

            $order->product_id=$data->product_id;
            $order->product_name=$data->product_name;
            $order->product_image=$data->product_image;
            $order->quantity=$data->quantity;
            $order->price=$data->price;
            $order->customer_id=$data->customer_id;
            $order->customer_name=$data->customer_name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->status='pending';
            $order->payment_method='cash on delivery';

            $order->save();

            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
    
        }


        return redirect()->back()->with('message','Order Placed Successfully');
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $id=Auth::id();
            $order=Order::where('customer_id',$id)->get();
            return view('store.purchasedhistory',compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=Order::find($id);
        $order->status = 'cancelled';
        $order->delete();

        return redirect()->back();
    }
}
