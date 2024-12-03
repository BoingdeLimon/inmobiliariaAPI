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


    public function update($realEstateId = null)
    {
        $this->refreshData($realEstateId);
    }
    public function mount($realEstateId = null)
    {
      $this->refreshData($realEstateId);

    }
    public function refreshData($realEstateId = null){

        // $this->rentals = Rentals::where('real_estate_id', $realEstateId)->get();

        $this->rentals = collect([
            (object) [
                'id' => 1,
                'user_id' => 1,
                'id_real_estate' => 1,
                'rent_start' => now()->subMonth(),
                'rent_end' => null,
                'reason_end' => null,
                'created_at' => now(),
            ],
            (object) [
                'id' => 2,
                'user_id' => 1,
                'id_real_estate' => 1,
                'rent_start' => now()->subMonth(),
                'rent_end' => null,
                'reason_end' => null,
                'created_at' => now(),
            ],
            (object) [
                'id' => 3,
                'user_id' => 1,
                'id_real_estate' => 1,
                'rent_start' => now()->subMonth(),
                'rent_end' => null,
                'reason_end' => null,
                'created_at' => now(),
            ],
            (object) [
                'id' => 4,
                'user_id' => 1,
                'id_real_estate' => 1,
                'rent_start' => now()->subMonth(),
                'rent_end' => null,
                'reason_end' => null,
                'created_at' => now(),
            ],
        ]);
        $this->rentals = $this->rentals->map(function ($rental) {
            $user = User::find($rental->user_id);
            $realEstate = RealEstate::find($rental->id_real_estate);
            if ($user) {
                $rental->nameUser = $user->name;
                $rental->photoUser = $user->photo;
            } 
            if($realEstate){
                $rental->nameRealEstate = $realEstate->title;
            }
            return $rental;
        });
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
