<?php

namespace App\Livewire;

use App\Models\RealEstate;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Rentals extends Component
{
    public $rentals = [];

    public function mount()
    {
        $this->rentals = RealEstate::with(['photos', 'address'])->get()->toArray(); 
    }

    public function render()
    {
        return view('livewire.rentals');
    }
}