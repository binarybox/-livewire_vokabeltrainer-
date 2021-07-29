<?php

namespace App\Http\Livewire\Vokabels;

use Livewire\Component;
use App\Models\Vokabel;

class SingleVokabel extends Component
{
    public $vokabel;
    public $can_save = false;
    protected $rules = [
      "vokabel.word" => "required"
    ];

    public function updatedVokabel()
    {
        $this->can_save = true;
    }


    public function save()
    {
        $this->can_save = false;
        $this->vokabel->save();
    }

    public function remove()
    {
        $this->emitUp("removeVokabel");
        $this->vokabel->delete();
    }

    public function render()
    {
        return view('vokabels.single-vokabel');
    }
}
