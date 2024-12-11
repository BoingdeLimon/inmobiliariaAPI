<?php

namespace App\Livewire;

use App\Models\Comments;
use App\Models\Messages;
use App\Models\RealEstate;
use App\Models\Rentals;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Profile extends Component
{
    public $messages;
    public $realEstates;
    public $selectedProperty;

    public $rentalRealEstate;


    public $rentWithComment;

    public function mount()
    {
        $this->messages = Messages::where('user_id', Auth::user()->id)->get();
        $this->realEstates = RealEstate::with(['address', 'photos'])
            ->where('user_id', Auth::user()->id)
            ->get();
        $this->selectedProperty = $this->realEstates->first();

        $rentals = Rentals::where('user_id', Auth::user()->id)->get();
        $comments = Comments::where('user_id', Auth::user()->id)->get();

        $this->rentWithComment = $rentals;
        
        foreach ($this->rentWithComment as $rental) {
            $rental->comment = $comments->where('id_rentals', $rental->id)->first();
        }
        // var_dump($comments);
        // var_dump($this->rentWithComment);
    }
    public function loadRealEstateTitle($id_rentals)
    {
        $rentalRealEstate = RealEstate::find(
            Rentals::find($id_rentals)->id_real_estate
        );
        return $this->rentalRealEstate = $rentalRealEstate->title;
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
