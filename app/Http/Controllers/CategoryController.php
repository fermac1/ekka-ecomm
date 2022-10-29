<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(9);
        $category = Category::all();
        
        $wishlist = Wishlist::where('user_id', Auth::id())->get(); 

        return view('category_products', compact('products','category', 'wishlist'));
    }

    
    public function render($slug)
    {
        $categories = Category::all();
        $prod = Product::all();
        
        $wishlist = Wishlist::where('user_id', Auth::id())->get(); 
        
        $cat = Category::where('slug', $slug)->first();
        // dd($cat->id);
        $category_id = $cat->id;
        // echo $category_id;
        $subcategory = Subcategory::where('parent_cat_id', $cat->id)->first();
        // $sub_category_id = $subcategory->id;
        // $products = Product::where('cat_id', $sub_category_id)
                                    // ->take(6)->get();
        $products = Product::join('subcategories', 'subcategories.id', '=', 'products.sub_cat_id')
        ->join('categories', 'categories.id', '=', 'subcategories.parent_cat_id')->where('subcategories.parent_cat_id', '=', $cat->id)
        ->paginate(6, ['products.*', 'products.id']);

        return view('category', compact('categories','prod','wishlist', 'products'));
    }

}
