<?php

namespace App\Livewire;

use App\Models\RealEstate;
use App\Models\Rentals;
use App\Models\User;
use Livewire\Component;

class RentList extends Component
{
    public $isModalOpen = false;
    public $rentals;
    public $userAndReal;

    protected $listeners = ['rentAdded' => 'updateListRents'];
    public $realEstateId;
    public function update($realEstateId = null)
    {
        $this->refreshData($realEstateId);
    }
    public function mount($realEstateId = null)
    {
        $this->refreshData($realEstateId);
    }
    public function refreshData($realEstateId = null)
    {
        $this->realEstateId = $realEstateId;
        $this->rentals = Rentals::where('id_real_estate', $realEstateId)->get();

        if ($this->rentals->count() > 0) {
            foreach ($this->rentals as $rent) {
                if (!$this->userAndReal) {
                    $this->userAndReal = new \stdClass();
                }
                $user = User::find($rent->user_id);
                $realEstate = RealEstate::find($rent->id_real_estate);
                if ($user && $realEstate) {
                    $this->userAndReal->userName = $user->name;
                    $this->userAndReal->userPhoto = $user->photo;
                    $this->userAndReal->reaLEstateName = $realEstate->title;
                }
            }
        }
    }


    public function updateListRents($rentID = null)
    {
        $this->refreshData($this->realEstateId);
    }


    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function render()
    {
        return view('livewire.rent-list');
    }
}
