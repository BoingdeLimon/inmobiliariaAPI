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

    public $rentals;
     public $real_estate_property;
 
    public function mount()
    {
        $this->messages = Messages::where('user_id', Auth::user()->id)->get();
        $this->realEstates = RealEstate::with(['address', 'photos'])
            ->where('user_id',Auth::user()->id)
            ->get();
        $this->selectedProperty = $this->realEstates->first();

        $this->rentals = collect([
            (object) [
                'id' => 1,
                'id_user' => 1,
                'id_real_estate' => 2,
                'rent_start' => now()->subMonth(),
                'rent_end' => null,
                'reason_end' => null,
                'created_at' => now(),
            ],
            (object) [
                'id' => 1,
                'id_user' => 1,
                'id_real_estate' => 2,
                'rent_start' => now()->subMonth(),
                'rent_end' => null,
                'reason_end' => null,
                'created_at' => now(),
            ],
            (object) [
                'id' => 1,
                'id_user' => 1,
                'id_real_estate' => 2,
                'rent_start' => now()->subMonth(),
                'rent_end' => null,
                'reason_end' => null,
                'created_at' => now(),
            ],
            (object) [
                'id' => 1,
                'id_user' => 1,
                'id_real_estate' => 2,
                'rent_start' => now()->subMonth(),
                'rent_end' => null,
                'reason_end' => null,
                'created_at' => now(),
            ],
        ]);

        $this -> real_estate_property = RealEstate::find(1);

        
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
