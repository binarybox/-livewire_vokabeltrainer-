<?php

namespace App\Http\Livewire\Vokabels;

use Livewire\Component;
use \App\Models\Vokabel;
use Illuminate\Support\Facades\DB;

class AddVokabel extends Component
{
    public $vokabel = "";
    public $answers = "";
    public $res = [];

    protected $rules = [
        'vokabel' => 'required',
        'answers' => 'required',
    ];

    public function submit()
    {
        $this->validate();
        $vokabel = Vokabel::firstOrCreate(["word" => trim($this->vokabel)]);
        $ans = explode(",", $this->answers);
        foreach ($ans as $vok) {
            $answer = Vokabel::firstOrCreate(["word" => trim($vok)]);
            if (!DB::table("vokabel_answers")->where([
          ["vokabels_id", "=", $vokabel->getKey()],
          ["answer_id", "=", $answer->getKey()]
        ])->exists()) {
                DB::table("vokabel_answers")->insert(array(
            "vokabels_id" => $vokabel->getKey(),
            "answer_id" => $answer->getKey(),
          ));
            }

            if (!DB::table("vokabel_answers")->where([
          ["vokabels_id", "=", $answer->getKey()],
          ["answer_id", "=", $vokabel->getKey()]
        ])->exists()) {
                DB::table("vokabel_answers")->insert(array(
            "vokabels_id" => $answer->getKey(),
            "answer_id" => $vokabel->getKey()
          ));
            }
        }
        $this->vokabel = "";
        $this->answers = "";
        $this->emitUp("addVokabel");
    }

    public function render()
    {
        return view('vokabels.add-vokabel');
    }
}
