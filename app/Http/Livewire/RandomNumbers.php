<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Numbers;

class RandomNumbers extends Component
{
    public $zeroToThirty = [
      "cero",
      "uno",
      "dos",
      "tres",
      "cuatro",
      "cinco",
      "seis",
      "siete",
      "ocho",
      "nueve",
      "diez",
      "once",
      "doce",
      "trece",
      "catorce",
      "quince",
      "dieciséis",
      "diecisiete",
      "dieciocho",
      "diecinueve",
      "veinte",
      "veintiuno",
      "veintidós",
      "veintitrés",
      "veinticuadro",
      "veinticinco",
      "veintiséis",
      "veintisiete",
      "veintiocho",
      "veintinueve"
    ];

    private $tens = [
      "diez",
      "veinte",
      "treinta",
      "cuarenta",
      "cincuenta",
      "sesenta",
      "setenta",
      "ochenta",
      "noventa"
    ];
    public $number = 0;
    public $value = "";
    public $try = false;
    public $answer = "";

    public $start = 0;
    public $end = 100;
    public $settings = false;

    public function toggleSettings(){
      $this->settings = !$this->settings;
    }

    private function validateNumber(){
      $thousand = $this->number / 1000;
      $hundred = ($this->number / 100) % 1000;
      $ten = ($this->number / 10) % 100;
      $one = $this->number % 10;
      $numbers = explode(" ", $this->value);
      if($thousand > 0){
        // TODO handle thousands
      }
      if($hundred > 0){
        // TODO handle hundred
      }
      if($ten > 0){
        if($ten < 3){
          return $this->zeroToThirty[($ten * 10) + $one] === implode(" ", $numbers);
        }
        else{
          if($numbers[0] !== $this->tens[$ten - 1] || (count($numbers) > 1 && $numbers[1] !== "y")){
            return false;
          }
          if(count($numbers) === 1){
            return true;
          }
          unset($numbers[0]);
          unset($numbers[1]);
          $numbers = array_values($numbers);
        }
      }
      if($one > 0){
        return $this->zeroToThirty[$one] === $numbers[0];
      }
      return true;
    }

    public function submit(){
      if($this->validateNumber()){
        if(!$this->try){
          Numbers::inc($this->number);
        }
        $this->mount();
      }
      else{
        if(!$this->try){
          Numbers::dec($this->number);
        }
        $this->try = true;
      }
    }

    public function help(){
      if($this->try){
        $thousand = $this->number / 1000;
        $hundred = ($this->number / 100) % 1000;
        $ten = ($this->number / 10) % 100;
        $one = $this->number % 10;
        $numbers = explode(" ", $this->value);
        if($thousand > 0){
          // TODO handle thousands
        }
        if($hundred > 0){
          // TODO handle hundred
        }
        if($ten > 0){
          if($ten < 3){
            $this->answer .= $this->zeroToThirty[$this->number];
            return;
          }
          $this->answer = $this->answer . " " . $this->tens[$ten - 1];
          if($one > 0){
            $this->answer = $this->answer . " y ";
          }
        }
        if($one > 0){
          $this->answer = $this->answer . $this->zeroToThirty[$one];
        }
      }
    }

    public function mount(){
      $this->value = "";
      $this->answer = "";
      $this->try = false;
      $this->number = rand($this->start, $this->end);

    }
    public function render()
    {
        return view('livewire.random-numbers');
    }
}
