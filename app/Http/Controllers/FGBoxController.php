<?php

namespace App\Http\Controllers;

use App\Models\FGBox;
use App\Models\Box;
use App\Models\FGRetention;
use App\Models\Retention;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;

class FGBoxController extends Controller
{

    public function index()
    {
        $listItems = FGBox::latest()->take(2)->get();
        $boxes = FGBox::all();
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('fg_boxes.index', compact('boxes', 'listItems'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $latest_box = FGBox::latest()->first();
        if($latest_box == NULL){
            $box_type = "new";
            $box_id = 0;
        }else{
            $box_type = $request->type;
            $box_id = $latest_box->id;
        }

        if($box_type == "new") {
            $box_id++;
            $box = new FGBox;
            $box->name = "FG" . $box_id;
            $box->save();
        }

        $retentions = new FGRetention;
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

        dd(Box::latest()->take(8)->get());
        $moo = "i want waffles";


        $retentions = Retention::where('box_id', $box->id)->get();

        return view('fg_boxes.show', compact('box', 'retentions', 'moo'));
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
