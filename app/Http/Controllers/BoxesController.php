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
        $box_info = Box::latest()->first();
        $box_id = $box_info->id;

        $box_type = $request->type;

        if($box_type == 'new') {
            $box_id++;
            $box = new Box;
            $box->name = "Box" . $box_id;
            $box->save();

        }


        $retentions = new Retention;
        $retentions->box_id = $box_id;
        $retentions->product_id = $request->pn;

        $retentions->user_id = Auth::user()->id;
        $retentions->sub_category_id = "1";
        $retentions->start_date = Carbon::now();
        $retentions->lot = $request->lot;
        $retentions->exp_date = Carbon::now();

        $retentions->save();

        return Redirect()->back()->with('success','Retention Inserted Successfully');
    }

}
