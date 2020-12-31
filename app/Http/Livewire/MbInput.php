<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MbInput extends Component
{
  public $ID = "";
  public $type = "text";
  public $value = "";
  public $label = "label";
  private $focused = false;
    public function render()
    {
        return view('livewire.mb-input');
    }

    public function focus(){
      $this->focused = true;
    }
}
