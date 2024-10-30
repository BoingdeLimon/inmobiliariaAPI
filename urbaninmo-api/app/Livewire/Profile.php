<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RealEstate;

class Profile extends Component
{
    public function render()
    {
        $properties = RealEstate::where('user_id', auth()->id())->get();
        return view('livewire.profile', ['properties' => $properties]);
    }
}
