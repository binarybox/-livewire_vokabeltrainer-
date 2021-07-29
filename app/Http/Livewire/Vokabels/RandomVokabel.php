<?php

namespace App\Http\Livewire\Vokabels;

use Livewire\Component;
use App\Models\Vokabel;
use App\Models\VokabelSet;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class RandomVokabel extends Component
{
    public $vokabel;
    public $setEntry;
    public $answer = "";
    public $answersArray = "";
    public $try_vokabel = false;
    public $i = 0;

    public function help()
    {
        $this->answersArray = $this->vokabel->answers->pluck("word")->implode(", ");
    }

    public function submit()
    {
        $answers = $this->vokabel->answers;

        $entry_query = [
          ["user_id", "=", \Auth::id()],
          ["vokabel_id", "=", $this->vokabel->id]
        ];

        if ($answers->where("word", $this->answer)->count() > 0) {
            if (!$this->try_vokabel) {
                $this->vokabel->inc();
            }

            $this->setVokabel();
        } else {
            if (!$this->try_vokabel) {
                $this->vokabel->dec();
            }
            $this->try_vokabel = true;
        }
    }

    public function setVokabel()
    {
        VokabelSet::check();
        $this->setEntry = VokabelSet::orderby("updated_at")->take(5)->get()->random(1)->first();

        $this->vokabel = $this->setEntry->vokabel;
        $this->answer = "";
        $this->answersArray = "";
        $this->try_vokabel = false;
    }

    public function mount()
    {
        $this->setVokabel();
    }
    public function render()
    {
        return view('vokabels.random-vokabel');
    }
}
