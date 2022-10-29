<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        $new_arrivals = Product::orderBy('created_at', 'DESC')
                                ->take(4)->get();
        $wishlist = Wishlist::where('user_id', Auth::id())->get(); 
        return view('checkout',compact('cart', 'new_arrivals', 'wishlist'));
    }
}
