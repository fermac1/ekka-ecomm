<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $cart = session()->get('cart');
        $products = Product::all();
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        
        if ($cart == null)
            $cart = [];

        return view('cart',compact('cart', 'wishlist', 'products'));
    }

    public function singleProdAddToCart($id)
    {
        $product = Product::findOrFail($id);
        $product_attr = ProductAttribute::where('prod_id', $product->id)->get();

        // $product_attr = ProductAttribute::findOrFail($id);
        // $product = Product::where('id', $product_attr->prod_id)->get();



        $cart = session()->get('cart', []);
foreach ($product_attr as $key => $value) {
    $cart[$id] = [
        "id" => $product->id,
        "product_name" => $product->product_name,
        "qty" => 1,
        "sale_price" => $value->sale_price,
        "regular_price" => $value->regular_price,
        "slug" => $product->slug,
        "images" => $value->images,
        "size" => $value->size,
        "color" =>$value->color
    ];
    // dd($value->id);
}
        // foreach ($product_attr as $key => $data) {
        // if(isset($cart[$id])) {

        //         if($cart[$id]['qty'] < $data->qty)
        //         {
        //             $cart[$id]['qty']++;
        //         }else
        //         {
        //             echo 'error';
        //         }
            
        // } else {
            // $cart[$id] = [
            //     "id" => $product->id,
            //     "product_name" => $product->product_name,
            //     "qty" => 1,
            //     "sale_price" => $product_attr->sale_price,
            //     "regular_price" => $product_attr->regular_price,
            //     "slug" => $product->slug,
            //     "image" => $product->images,
            //     "size" => $product_attr->size,
            //     "color" =>$product_attr->color
            // ];
        // }
    // }
          
        session()->put('cart', $cart);
        return redirect('cart')->with('success', 'Product added to cart successfully!');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {

            if($cart[$id]['qty'] < $product->qty)
            {
                $cart[$id]['qty']++;
            }else
            {
                echo 'error';
            }
            
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "product_name" => $product->product_name,
                "qty" => 1,
                "sale_price" => $product->sale_price,
                "regular_price" => $product->regular_price,
                "slug" => $product->slug,
                "images" => $product->images,
                "size" => $product->size
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function increaseQty($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

            if($cart[$id]['qty'] < $product->qty)
            {
                $cart[$id]['qty']++;
            }
            session()->put('cart', $cart);
        
    }

    public function decreaseQty()
    {
        
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            
            $cart[$request->id]["qty"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Item removed successfully');
        }
    }

    public function shop(){
        return redirect('/');
    }
}
