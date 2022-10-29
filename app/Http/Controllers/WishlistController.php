<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlist = Wishlist::where('user_id', Auth::id())->get();      
        $category_product = Category::select('*')->where('category_name', '!=','NULL')->get();
        $products = Product::all();
        $product_attribute = ProductAttribute::all();
        return view('wishlist', compact('wishlist', 'category_product', 'products'));
    }

    public function add($id){
        if(Auth::check()){
            if(Product::find($id)){
                if (!Wishlist::where('prod_id', $id)->where('user_id', Auth::id())->exists()) {
                    $wish = new Wishlist();
                    $wish->prod_id = $id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                }
                else {
                    return redirect()->back()->with('warning', 'Product has already been added to Wishlist');
                }

                // session()->flash('success', 'Product added to Wishlist');
                return redirect()->back()->with('success', 'Product added to Wishlist');

            }else{
                return redirect()->back()->with('danger', 'Product does not exist');
            }
        }else{
            return redirect()->back()->with('warning', 'Login to continue');
        }
        return view('wishlist', compact('wishlist'));
    }

    public function remove(Request $request)
    {
        if(Auth::check()) {
            $prod_id = $request->id;
            if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
            $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
            $wish->delete();
            // return response()->json(['status'=>'Product removed successfully']);
            return back()->with('message', 'Product removed successfully');
            }
        }else{
            return response()->json(['status'=>'Login to continue']);
        }
    }
    
}
