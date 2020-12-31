<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MbButton extends Component
{
  public $text = "";
  public $type = "";
    public function render()
    {
        return view('livewire.mb-button');
    }
}
