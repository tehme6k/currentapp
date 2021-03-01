<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Box;

class TestController extends Controller
{
    public function ViewTest(){
        $boxes = Box::all();
        return view('test', compact('boxes'));
    }
}
