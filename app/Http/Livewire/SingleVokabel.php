<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vokabel;

class SingleVokabel extends Component
{
    public $vokabel;
    protected $rules = [
      "vokabel.word" => "required"
    ];


    public function save(){
      $this->vokabel->save();
    }

    public function remove(){
      $this->emit("removeVokabel");
      $this->vokabel->delete();
    }

    public function render()
    {
        return view('livewire.single-vokabel');
    }
}
