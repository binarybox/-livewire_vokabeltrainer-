<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VokabelController extends Controller
{
    public function addVokabel(Request $request){
      return view('vokabels.add-vokabel');
    }

    public function RandomVokabel(Request $request){
      return view('vokabels.random-vokabel');
    }
}
