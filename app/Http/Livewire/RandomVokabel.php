<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Vokabel;
use App\Models\VokabelSet;
use Carbon\Carbon;

class RandomVokabel extends Component
{
  public $vokabel;
  public $setEntry;
  public $answer = "";
  public $answersArray = "";
  public $try = false;

  public function help(){
    $ans = $this->vokabel->answers->pluck("word");
    $this->answersArray = implode(', ', $ans->toArray());
    $this->answer = "";
  }

  public function submit(){
    $answers = $this->vokabel->answers;
    if($answers->where("word", $this->answer)->count() > 0){
      if(!$this->try){
        $this->setEntry->counter += 1;
        $this->vokabel->counter += 1;
      }
      $this->vokabel->solved = Carbon::now();
      $this->vokabel->save();
      $this->setEntry->updated_at = Carbon::now();
      $this->setEntry->save();
      $this->mount();
    }
    else{
      if(!$this->try){
        if($this->setEntry->counter > 0){
          $this->setEntry->counter -= 1;
          $this->vokabel->counter -= 1;
          $this->vokabel->save();
          $this->setEntry->save();
        }
      }
      $this->try = true;
    }
  }

  private function checkSet(){

  }

  public function mount(){
    VokabelSet::check();
    $this->setEntry = VokabelSet::orderby("updated_at")->take(5)->get()->random(1)->first();
    $this->vokabel = $this->setEntry->vokabel;
    $this->answer = "";
    $this->answersArray = "";
    $this->try = false;
  }
    public function render()
    {
        return view('livewire.random-vokabel');
    }
}
