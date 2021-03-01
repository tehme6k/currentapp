<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\facades\DB;

class SubController extends Controller
{
    public function AllSub(){
        $subs = SubCategory::latest()->paginate(8);
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.sub', compact('subs'));
    }

    public function AddSub(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ],
        [
            'name.required' => 'Please Input Category Name',
            'name.max' => 'Category Less than 255 chars',
        ]);

        
        $sub = new SubCategory;
        $sub->name = $request->name;
        $sub->user_id = Auth::user()->id;
        $sub->save();  
        
        return Redirect()->back()->with('success','Sub Category Inserted Successfully');
        
    }
}



// class CategoryController extends Controller
// {
//     public function AllCat(){
//         $categories = Category::latest()->paginate(8);
//         // $categories = DB::table('categories')->latest()->paginate(5);
//         return view('admin.category.index', compact('categories'));
//     }

//     public function AddCat(Request $request){
//         $validatedData = $request->validate([
//             'name' => 'required|unique:categories|max:255',
//             // 'sub_category_name' => 'required|unique:sub_categories|max:255',
//         ],
//         [
//             'name.required' => 'Please Input Category Name',
//             'name.max' => 'Category Less than 255 chars',
//         ]);

        
//         $category = new Category;
//         $category->name = $request->name;
//         $category->user_id = Auth::user()->id;
//         $category->save();  
        
//         // $subCategory = new SubCategory;
//         // $subCategory->name = $request->sub_category_name;
//         // $subCategory->user_id = Auth::user()->id;
//         // $subCategory->save(); 

//         return Redirect()->back()->with('success','Category Inserted Successfully');
        
//     }
// }