<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberController extends Controller
{
  public function RandomNumber(Request $request){
    return view('numbers.random-number');
  }
}
