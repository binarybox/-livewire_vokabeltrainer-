<?php

namespace App\Http\Livewire\Numbers;

use Livewire\Component;
use App\Models\Numbers;

class ListNumbers extends Component
{
    public $min = 0;
    public $max = 100;
    public $total_max = 100;
    public $numbers;

    public function getNumberValue($number)
    {
        $tmp = $this->numbers->first(function ($elem) use ($number) {
            return $number == $elem->number;
        });
        if ($tmp) {
            return $tmp->counter;
        }
        return 0;
    }

    public function render()
    {
        try {
            $max_number = Numbers::orderBy('number', "desc")->first()->number;
            $this->total_max = $max_number > 100 ? $max_number : 100;
        } catch (\Excetion $e) {
            $this->total_max = 100;
        }
        $this->numbers = Numbers::where([
          ["number", ">=", $this->min],
          ["number", "<=", $this->max],
          ["user_id", "=", \Auth::id()]
        ])->select("number", "counter")->get();
        return view('numbers.list-numbers');
    }
}
