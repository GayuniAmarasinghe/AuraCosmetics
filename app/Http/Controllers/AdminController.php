<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

use App\Models\User;

class AdminController extends Controller
{
    public function view_category()
    {

        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;

        $data->category_name = $request->category_name;

        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new Product;

        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->product_price;
        $product->discount_price = $request->discount_price;

        $image = $request->file('image');
        $image_name = time() . '.' . $image->extension();
        $image->move(('products'), $image_name);
        $product->image = $image_name;

        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function show_product()
    {
        $product = Product::all();
        return view('admin.showproduct', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function update_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.editproduct' , compact('product' , 'category'));
    }

    public function update_product_confirm(Request $request,$id)
    {
        $product = Product::find($request->id);

        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->product_price;
        $product->discount_price = $request->discount_price;

        $image = $request->file('image');
        if($image){
            $image_name = time() . '.' . $image->extension();
            $image->move(('products'), $image_name);
            $product->image = $image_name;
        }

        $product->save();

        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    public function addressbook()
    {
        $address = User::all();
        return view('admin.addressbook' , compact('address'));
    }

    public function analytics()
    {
        return view('admin.analytics');
    }

    public function view_order()
    {
        $order = Order::all();
        return view('admin.order', compact('order'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->status = 'delivered';
        $order->save();
        return redirect()->back();
    }

}
