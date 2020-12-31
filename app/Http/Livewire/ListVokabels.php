<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Vokabel;

class ListVokabels extends Component
{
  public $vokabels;
  public $updates = [];
  public $search = "";

  protected $listeners = [
    "addVokabel" => '$refresh',
    "removeVokabel" => '$refresh'
  ];

  public function remove($id) {
    $vokabel = Vokabel::find($id);
    $vokabel->delete();
  }

    public function render()
    {
      $this->vokabels = Vokabel::where([["word", "LIKE", "%" . $this->search . "%"]])->orderBy("counter")->get();
      return view('livewire.list-vokabels');
    }
}
