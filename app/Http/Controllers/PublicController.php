<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function login(Request $request){
      return view("public.login", ["title" => "Vocable trainer login"]);
    }

    public function register(Request $request){
      return view("public.register", ["title" => "Vocable trainer register"]);
    }


    public function logout(Request $request){
      Auth::logout();
      return redirect("login");
    }
}
