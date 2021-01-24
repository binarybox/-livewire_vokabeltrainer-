<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
  public $email = "";
  public $password = "";
  public $remember = false;

  public function login(){
    $credentials = ["email" => $this->email, "password" => $this->password];
    if(Auth::attempt($credentials, $this->remember)){
      return redirect("/");
    }
    else{
      session()->flash("message", "Invalid credentials.");
    }
  }

    public function render()
    {
        return view('livewire.login');
    }
}
