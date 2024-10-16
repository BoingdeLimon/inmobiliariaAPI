<?php

namespace App\Livewire;

use Livewire\Component;

class CarouselRentals extends Component
{
    public $images = [

    ];
    public function mount()
    {
        $this->images = [
            'imgs/uno.jpg',
            'imgs/uno.jpg',
            'imgs/uno.jpg',
            'imgs/uno.jpg',
            'imgs/uno.jpg',
            'imgs/uno.jpg',
            'imgs/uno.jpg',
            'imgs/uno.jpg',
            'imgs/uno.jpg',
        ];
    }
    public function render()
    {
        return view('livewire.carousel-rentals');
    }
}
