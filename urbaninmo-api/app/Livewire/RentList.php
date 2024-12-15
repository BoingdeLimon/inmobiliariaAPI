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
    public $rentalWithUser;

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
           $this->rentalWithUser = $this->rentals->map(function ($rent) {
            
                return [
                    'id' => $rent->id,
                    'id_user' => $rent->id_user,
                    'id_real_estate' => $rent->id_real_estate,
                    'rent_start' => $rent->rent_start,
                    'rent_end' => $rent->rent_end,
                    'reason_end' => $rent->reason_end,
                    'name_real_estate' => RealEstate::find($rent->id_real_estate)->title,
                    'user_name' => User::find($rent->user_id)->name,
                    'user_photo' => User::find($rent->user_id)->photo
                ];
            });
        }
        // var_dump($this->rentals);
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
