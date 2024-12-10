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
            $temporalComment = $comments->where('id_real_estate', $rental->id_real_estate)->first();
            if ($temporalComment) {
                $rental->comment = $temporalComment;
                $comments = $comments->reject(function ($comment) use ($temporalComment) {
                    return $comment->id === $temporalComment->id;
                });
            }
        }
    }
    public function loadRealEstateTitle($id_real_estate)
    {
        $rentalRealEstate = RealEstate::find($id_real_estate);
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
