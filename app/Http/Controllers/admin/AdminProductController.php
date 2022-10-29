<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\ProductColor;
use App\Models\ProductSize;

class AdminProductController extends Controller
{
    public function adminIndex()
    {
        $category = Category::all();
        return view('admin.add_product', ['category'=>$category]);
    }

    public function addAttr()
    {
        $product = Product::all();
        return view('admin.add_product_attribute', compact('product'));
    }

    public function addProd(Request $request)
    {
        $product = new Product();

        //validate the input
        $request->validate([
            'product_name'=> 'required',
            'slug'=> 'required',
            'cat_id'=> 'required',
            'description'=> 'required',
            'full_detail'=> 'required',
            'status'=> 'required',
            'SKU'=> 'required',
            'featured'=> 'required',
            'brand'=> 'required'

        ]);

        //save to database
            $product->product_name = $request->input('product_name');
            $product->slug = $request->input('slug');
            $product->sub_cat_id = $request->input('cat_id');
            $product->description = $request->input('description');
            $product->full_detail = $request->input('full_detail');
            $product->status = $request->input('status');
            $product->SKU = $request->input('SKU');
            $product->featured = $request->input('featured');
            $product->brand = $request->input('brand');
            $product->save();
       

        return back()->with('success', 'Product has been added successfully!');
    }

    public function addProdAttr(Request $request)
    {
        $product_attr = new ProductAttribute();

        //validate the input
        $request->validate([
            'prod_id'=> 'required',
            'regular_price'=> '',
            'sale_price'=> 'required',
            'discount'=> '', 
            'color' => '',
            'size' =>'',
            'quantity'=>'required',
            'images' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        //add single image
        $newImage = $request->images->getClientOriginalName();

        $request->images->move(public_path('frontend/images/product'), $newImage); 

        //calculate discount
        $discount = '';
        
        if($request->regular_price)
        {
            $R_P = $request->input('regular_price');
            $S_P = $request->input('sale_price');
            $discount = ($R_P - $S_P) / (0.01 * $R_P) ;
            $product_attr->discount = $discount;
        }

        //save to database
            $product_attr->prod_id = $request->input('prod_id');
            $product_attr->regular_price = $request->input('regular_price');
            $product_attr->sale_price = $request->input('sale_price');
            $product_attr->color = $request->input('color');
            $product_attr->qty = $request->input('quantity');
            $product_attr->size = $request->input('size');
            $product_attr->images = $newImage;
            $product_attr->save();

        return back()->with('success', 'Product attributes has been added successfully!');
    }
    

    public function listProd()
    {
        $product = Product::all();
        return view('admin.product_list', compact('product'));
    }

    public function editProd($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $category = Category::all();
        return view('admin.edit_product', compact('product', 'category'));
    }

    public function updateProd(Request $request, $id)
    {
        $product = Product::find($id);

        if($request->hasFile('image'))
        {
            // dd($request->image);
            $path = 'frontend/images/product/'.$product->image;
            // $path_icon = 'frontend/images/icons/'.$category->icon;
            
            // if(File::exists($path))
            // {
            //     File::delete($path);
            // }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move(public_path('frontend/images/product/'), $filename);
            $product->image = $filename;
        }

        $images = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $ext = $file->getClientOriginalExtension();
                $ext_name = md5(rand(10, 1000));
                $filename = $ext_name. '.' .time().'.'.$ext;
                $file->move(public_path('frontend/images/product'), $filename);
                $images[] = $filename;
            }
        }

        $discount = '';
        
        if($request->regular_price)
        {
            $R_P = $request->input('regular_price');
            $S_P = $request->input('sale_price');
            $discount = ($R_P - $S_P) / (0.01 * $R_P) ;
            $product->discount = $discount;
        }

            $product->product_name = $request->input('product_name');
            $product->slug = $request->input('slug');
            $product->sub_cat_id = $request->input('cat_id');
            $product->regular_price = $request->input('regular_price');
            $product->sale_price = $request->input('sale_price');
            $product->images = implode('|', $images);
            $product->color = implode('|', $request->input('color'));
            if ($request->input('size')) {
                # code...
                $product->size = implode('|', $request->input('size'));
            }
            $product->qty =$request->input('quantity');
            $product->description = $request->input('description');
            $product->full_detail = $request->input('full_detail');
            $product->status = $request->input('status');
            $product->SKU = $request->input('SKU');
            $product->featured = $request->input('featured');
            $product->brand = $request->input('brand');
            $product->update();
        
    

            //redirect the user
            return redirect('admin/product_list')->with('message', 'Product has been updated successfully!');
    }

    public function deleteProd($id)
    {
        $prod = Product::find($id);
        $prod->delete();

        return back()->with('message', 'Product has been deleted successfully!');
    }
}
