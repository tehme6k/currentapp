<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\facades\DB;

class ProductsController extends Controller
{
    public function AllProd(){
        // $products = Product::all();
        $products = Product::first()->paginate(5);
        $categories = Category::all(['id','name']);
        $subCategories = SubCategory::all(['id','name']);
        // dd($products);
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('products.index', compact('products', 'categories', 'subCategories'));
    }

    public function AddProd(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:products|max:255',
            'part_number' =>'required|unique:products',
        ],
        [
            'name.required' => 'Please Input Product Name',
            'name.max' => 'Category Less than 255 chars',
        ]);


        $products = new Product;
        $products->user_id = Auth::user()->id;
        $products->category_id = $request->category;        
        $products->sub_category_id = $request->sub_category;
        $products->part_number = $request->part_number;
        $products->name = $request->name; 
        // dd($products->all());  
        $products->save();  
        
        return Redirect()->back()->with('success','Product Inserted Successfully');       
    }

    // public function AddProd(Request $request){
        
    //     $validatedData = $request->validate([
    //         'name' => 'required|unique:categories|max:255',
    //         'category_id' => 'required',
    //         'sub_category_id' => 'required',
    //         'user_id' => 'required',
    //     ],
    //     [
    //         'name.required' => 'Please Input Product Name',
    //         'name.max' => 'Category Less than 255 chars',
    //     ]);

        
    //     $products = new Product;
    //     $products->name = $request->name;
    //     $products->category_id = $request->category;
    //     $products->sub_category_id = $request->subCategory;
    //     $products->user_id = Auth::user()->id;
    //     // $sub->save();  
        
    //     // return Redirect()->back()->with('success','Sub Category Inserted Successfully');
        
    // }
}


