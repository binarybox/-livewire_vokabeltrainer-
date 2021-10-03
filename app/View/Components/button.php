<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button extends Component
{
    public $variant_class = 'bg-green-500';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($variant)
    {
        switch ($variant) {
            case "secondary":
                $this->variant_class = "bg-blue-500";
                break;
            case 'gray':
                $this->variant_class = 'bg-gray-400';
                break;
            case 'danger':
                $this->variant_class = 'bg-red-500';
                break;
        };
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.button', ["variant_class" => $this->variant_class]);
    }
}
