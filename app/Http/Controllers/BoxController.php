<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Retention;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;

class BoxController extends Controller
{

    public function index()
    {
        $listItems = Box::latest()->take(2)->get();
        $boxes = Box::all();
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('boxes.index', compact('boxes', 'listItems'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $latest_box = Box::latest()->first();
        if($latest_box == NULL){
            $box_type = "new";
            $box_id = 0;
        }else{
            $box_type = $request->type;
            $box_id = $latest_box->id;
        }

        if($box_type == "new") {
            $box_id++;
            $box = new Box;
            $box->name = "I" . $box_id;
            $box->save();
        }

        $retentions = new Retention;
        $retentions->box_id = $box_id;
        $retentions->product_id = $request->pn;
        $retentions->user_id = Auth::user()->id;
        $retentions->start_date = Carbon::now();
        $retentions->lot = $request->lot;
        $retentions->exp_date = Carbon::now();

        $retentions->save();

        return Redirect()->back()->with('success','Retention Inserted Successfully');
    }

    public function show(Box $box)
    {


        $matchThese = ['box_id' => $box->id];

        $retentions = Retention::where($matchThese)->get();
        return view('boxes.show', compact('box', 'retentions'));
    }

    public function edit(Box $box)
    {
        //
    }

    public function update(Request $request, Box $box)
    {
        //
    }

    public function destroy(Box $box)
    {
        //
    }
}
