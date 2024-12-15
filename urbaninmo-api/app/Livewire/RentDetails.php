<?php

namespace App\Livewire;

use App\Models\RealEstate;
use App\Models\Rentals;

use App\Models\User;
use Livewire\Component;

class RentDetails extends Component
{
    public $realEstateId;
    public $rentalID;

    public $rent;
    public $isModalOpen = false;

    public $users;
    public $userSearch;
    public $searchUserFinal;


    public $rentStart;
    public $rentEnd;
    public $reasonEnd;

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }
    
    public function searchUserByParameters()
    {
        $this->users = User::where('name', 'like', '%' . $this->userSearch . '%')->get();
        $this->searchUserFinal = null;
    }

    public function selectUser($id)
    {
        $this->searchUserFinal = User::find($id);
        $this->userSearch = $this->searchUserFinal->name;
    }

    public function mount($realEstateId = null, $rentalID = null)
    {
        $this->refreshRental($realEstateId, $rentalID);
    }

    public function update($realEstateId = null, $rentalID = null)
    {
        $this->refreshRental($realEstateId, $rentalID);
    }
    public function refreshRental($realEstateId = null, $rentalID = null)
    {
        $this->users = User::all();
        $rental = Rentals::find($rentalID);
        if ($rental) {
            $this->searchUserFinal = User::find($rental->user_id);
            $this->userSearch = $this->searchUserFinal->name;
            $this->rentStart = $rental->rent_start;
            $this->rentEnd = $rental->rent_end;
            $this->reasonEnd = $rental->reason_end;
        }
        $this->rentalID = $rentalID;
        $this->realEstateId = $realEstateId;
    }
    protected $rules = [
        'searchUserFinal.id' => 'required|exists:users,id',
        'rentStart' => 'required|date',
        'rentEnd' => 'nullable|date|after:rentStart',
        'reasonEnd' => 'nullable|string',
    ];

    public function submit()
    {
        // $this->validate([
        //     'searchUserFinal.id' => 'required|exists:users,id',
        //     'rentStart' => 'required',
        //     'rentEnd' => 'nullable',
        //     'reasonEnd' => 'nullable',
        // ]);
        $this->validate();

        if ($this->rentalID) {
            $this->updateRent();
        } else {
            $this->saveRent();
        }
        $this->closeModal();
        $this->reset();
    }
    public function updateRent()
    {
        $rent = Rentals::find($this->rentalID);
        $rent->update([
            'user_id' => $this->searchUserFinal->id,
            'id_real_estate' => $this->realEstateId,
            'rent_start' => $this->rentStart,
            'rent_end' => $this->rentEnd,
            'reason_end' => $this->reasonEnd,
        ]);
    }
    public function saveRent()
    {
        $rent = Rentals::create([
            'user_id' => $this->searchUserFinal->id,
            'id_real_estate' => $this->realEstateId,
            'rent_start' => $this->rentStart,
            'rent_end' => $this->rentEnd,
            'reason_end' => $this->reasonEnd,
        ]);
        $this->dispatch('rentAdded', $rent->id);
    }

    public function render()
    {
        return view('livewire.rent-details');
    }
}
