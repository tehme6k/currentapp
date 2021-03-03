<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retention;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\facades\DB;
use App\Models\Box;

class BoxesController extends Controller
{
    public function all(){
        $boxes = Box::all();
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('boxes.index', compact('boxes'));
    }

    public function add(Request $request){
        
        $box = new Box;
        $retentions = new Retention;
        $retentions->box_id = $request->box;   
        $box->name = "Box" . $request->box;
        $retentions->user_id = Auth::user()->id;    
        $retentions->sub_category_id = "1";
        $retentions->start_date = Carbon::now(); 
        $retentions->lot = $request->lot;
        $retentions->exp_date = Carbon::now();
        $box->save();
        $retentions->save();  
      
        return Redirect()->back()->with('success','Retention Inserted Successfully');       
    }

}
