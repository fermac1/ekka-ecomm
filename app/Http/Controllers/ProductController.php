<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $products = DB::table('products')->get();
        
        return view('single-product', ['products'=>$products]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $subcat_id = $product->sub_cat_id;
        // $category_id = $products->cat_id;

        $related_products = Product::where('sub_cat_id', $subcat_id)
                                    ->where('slug', '!=', $slug)
                                    ->take(4)->get();
        $category = Category::all();
        $wishlist = Wishlist::where('user_id', Auth::id())->get();

        //product attribute
        // $prod_attr = ProductAttribute::where('prod_id', $product->id)->get();
        $product_attr = DB::table('product_attributes')->where('prod_id', $product->id)->get();
        //join product and product attribute table
        // $prodjoin = Product::join('product_attributes', 'product_attributes.prod_id', '=', 'products.id')->where('slug', $slug)->get(['product_attributes.qty', 'products.product_name']);
// dd($prodjoin);
        return view('single-product', compact('product', 'related_products', 'category', 'wishlist', 'product_attr'));
    }

}
