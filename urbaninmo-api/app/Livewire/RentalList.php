<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\RealEstateController;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\RealEstate;
use Livewire\Attributes\On;

use App\Models\Photos;


class RentalList extends Component
{



    public $rentals;
    #[On('rentalDeleted')]
    public function mount()
    {
        // Fetch all rentals with their related address and photos
        $this->rentals = RealEstate::with(['address', 'photos'])->get();
    }
    public function borrar($id)
    {
        if($id){
            $controller = RealEstate::destroy($id);
            $this->dispatch('rentalDeleted');
        }else{
            session()->flash('error', 'No se ha podido borrar el alquiler');
        }
    }
    public function render()
    {
        return view('livewire.rental-list', [
            'rentals' => $this->rentals
        ]);
    }
}
