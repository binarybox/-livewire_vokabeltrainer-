<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Vokabel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
      $this->vokabels = Vokabel::where([["word", "LIKE", "%" . $this->search . "%"]])
                                ->leftJoin("user_stats", function($query){
                                  $query->on("user_stats.vokabel_id", "=", "vokabels.id")->where("user_stats.user_id", Auth::id());
                                })
                                ->select(array(
                                  "vokabels.*",
                                  "user_stats.counter as counter",
                                  DB::raw('user_stats.updated_at as solved'),
                                ))
                                ->orderBy("counter")
                                ->orderBy("word")
                                ->get();
      return view('livewire.list-vokabels');
    }
}
