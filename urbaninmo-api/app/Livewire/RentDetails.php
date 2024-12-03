<?php

namespace App\Livewire;

use App\Models\RealEstate;
use App\Models\User;
use Livewire\Component;

class RentDetails extends Component
{
    public $rent;
    public $isModalOpen = false;
    public $users;

    public $realEstates;

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }
    public function mount($rentID = null)
    {
        // $this -> rent = Rentals::find($rentID);
        $this -> users = User::all();
    }
    public function update($rentID = null)
    {
        // $this -> rent = Rentals::find($rentID);

    }

    public function submit(){

    }

    public function render()
    {
        return view('livewire.rent-details');
    }
}
