<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
  public $email = "";
  public $password = "";

  public function login(){
    session()->flash("message", "login: " . $this->email . $this->password);
  }
    public function render()
    {
        return view('livewire.login');
    }
}
