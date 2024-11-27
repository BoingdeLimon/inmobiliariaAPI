<?php

namespace App\Livewire;

use App\Models\Messages;
use App\Models\RealEstate;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Profile extends Component
{
    public $messages;
    public $realEstates;
    public $selectedProperty;

    public function mount()
    {
        $this->messages = Messages::where('user_id', Auth::user()->id)->get();
        $this->realEstates = RealEstate::with(['address', 'photos'])
            ->where('user_id',Auth::user()->id)
            ->get();
        $this->selectedProperty = $this->realEstates->first();
    }

    public function updatePropertyInfo($propertyId)
    {
        $this->selectedProperty = $this->realEstates->find($propertyId);
        $this->dispatch('post-updated.' . $propertyId); 

    }
    

    public function render()
    {
        return view('livewire.profile');
    }
}
