<?php
namespace App\Livewire;

use Livewire\Component;

class CarouselRentals extends Component
{
    public $images = [];

    public function mount($photos = null)
    {
        $this->images = $photos ?? [];
    }

    public function render()
    {
        return view('livewire.carousel-rentals');
    }
}
