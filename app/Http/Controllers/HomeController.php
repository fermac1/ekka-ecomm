<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('created_at', 'DESC')
        ->take(4)->get();
        $products = DB::table('products')->get();

        $modal_product = Product::all();
        // $product_info = DB::table('products')
        //     ->join('product_attributes', 'products.id', '=', 'product_attributes.prod_id')
        
        //     ->select('products.product_name as product_name', 'product_attributes.color as color')
        //     ->groupBy('products.id')->get();
       
        $wishlist = Wishlist::where('user_id', Auth::id())->get(); 
        $featured_products =  Product::where('featured', 'Yes')->get();
        $top_products = Product::orderBy('created_at', 'DESC')
                                ->take(8)->get();
        
        $new_arrivals = Product::orderBy('created_at', 'DESC')
                                ->take(4)->get();

        return view('index', compact('category', 'wishlist', 'featured_products', 'top_products', 'products', 'modal_product', 'new_arrivals'));
    }
}
