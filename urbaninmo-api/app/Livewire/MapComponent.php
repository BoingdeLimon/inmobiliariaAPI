<?php

namespace App\Livewire;

use Livewire\Component;

class MapComponent extends Component
{
    public $x;
    public $y;

    public function mount($x, $y)
    {
        $this->x = (float) $x;
        $this->y = (float) $y;
    }

    public function render()
    {
        return view('livewire.map-component');
    }
}
