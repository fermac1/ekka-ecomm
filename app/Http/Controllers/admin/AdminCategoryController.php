<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\Input;

class AdminCategoryController extends Controller
{
    
    public function categoryIndex()
    {       
        $category = Category::paginate(5);
       
        return view('admin.category', compact('category'))->with(request()->input('page'));
    }

    public function subCategoryIndex()
    {
        $main_categories = Category::all();
        $subcategory = Subcategory::paginate(5);
        return view('admin.sub_category', compact('main_categories', 'subcategory'))->with(request()->input('page'));
    }

    public function addCat(Request $request)
    {
        //validate the input
        $request->validate([
            'category_name'=> 'required|unique:categories,category_name',
            'slug'=> 'required',
            'icon'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required'
        ]);

        $category = new Category();
        if(($request->hasFile('image')) && ($request->hasFile('icon')))
        {
          
            $file = $request->file('image');
            $file_icon = $request->file('icon');
            $ext = $file->getClientOriginalExtension();
            $ext_icon = $file_icon->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $filename_icon = time().'.'.$ext_icon;
            $file->move('frontend/images/category-image/', $filename);
            $file_icon->move('frontend/images/icons/', $filename_icon);
            $category->image = $filename;
            $category->icon = $filename_icon;
        }

        $category->category_name = $request->input('category_name');
        $category->slug = $request->input('slug');
        // $category->image = $request->image;
        $category->description = $request->input('description');
        $category->save();

        return back()->with('addMessage', 'Category has been created successfully!');
    }

    public function addSubCat(Request $request)
    {
         //validate the input
         $request->validate([
            'name'=> 'required|unique:categories,category_name',
            'slug'=> 'required',
            'parent_cat_id' => 'required',
            'description' => 'required'
        ]);

        //create a new subcategory in database

        Subcategory::create($request->all());
        return back()->with('message', 'Sub Category has been created successfully!');
    }

    public function editCat($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('admin.edit_category', compact('category'));
    }

    public function editSubCat($slug)
    {
        $main_categories = Category::all();
        $subcategory = Subcategory::where('slug', $slug)->first();
        return view('admin.edit_subcategory', compact('main_categories','subcategory'));
    }

    public function updateCat(Request $request, $id)
    {
        $category = Category::find($id);

         //validate the input
        //  $request->validate([
        //     'icon'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        // ]);
        // dd($request->image);
        if($request->image)
        {
            // dd($request->image);
            $path = 'frontend/images/category-image/'.$category->image;
            // $path_icon = 'frontend/images/icons/'.$category->icon;
            
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('frontend/images/category-image/', $filename);
            $category->image = $filename;
        }

        if($request->icon)
        {
            $path_icon = 'frontend/images/icons/'.$category->icon;
            
            if(File::exists($path_icon))
            {
                File::delete($path_icon);
            }
            $file_icon = $request->file('icon');
            $ext_icon = $file_icon->getClientOriginalExtension();
            $filename_icon = time().'.'.$ext_icon;
            $file_icon->move('frontend/images/icons/', $filename_icon);
            $category->icon = $filename_icon;
        }

        $category->category_name = $request->input('category_name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->update();
        
    

            //redirect the user
            return redirect('admin/category')->with('message', 'Category has been updated successfully!');
    }

    public function updateSubCat(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);

        $subcategory->name = $request->input('name');
        $subcategory->slug = $request->input('slug');
        $subcategory->description = $request->input('description');
        $subcategory->update();
        
    

            //redirect the user
            return redirect('admin/sub_category')->with('message', 'Subcategory has been updated successfully!');
    }


    public function deleteCat($id)
    {
        $cate = Category::find($id);
        $cate->delete();

        return back()->with('message', 'Category has been deleted successfully!');
    }

    
    public function deleteSubCat($id)
    {
        $subcate = Subcategory::find($id);
        $subcate->delete();

        return back()->with('deletemessage', 'Subcategory has been deleted successfully!');
    }
}
