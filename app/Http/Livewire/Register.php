<?php

namespace App\Http\Livewire;

use Livewire\Component;

use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{

  public $email = "";
  public $name = "";
  public $password = "";
  public $password_repeat ="";

  public function register(){
    if($this->password !== $this->password_repeat){
      session()->flash("message", "passwords have to be the same.");
      return;
    }
    if(strlen($this->password) < 8){
      session()->flash("message", "The password has to be at least 8 characters long.");
    }
    if(User::where("email", $this->email)->exists()){
      session()->flash("message", "The email has to be uniqe.");
      return;
    }
    $password = Hash::make($this->password);
    $user = User::create(["name" => $this->name, "email" => $this->email, "password" => $password]);
    return redirect("/login");
  }
    public function render()
    {

        return view('livewire.register');
    }
}
