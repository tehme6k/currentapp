<?php

namespace App\Http\Controllers;

use App\Models\Retention;
use Illuminate\Http\Request;


class RetentionController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Retention $retention)
    {
        dd($retention);
        $retentions = Retention::where('box_id', $retention->id)->get();

        return view('retention.show', compact('retentions', 'retention'));
    }

    public function edit(Retention $retention)
    {
        //
    }

    public function update(Request $request, Retention $retention)
    {
        //
    }

    public function destroy(Retention $retention)
    {
        //
    }
}
