<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\RealEstate; 

class ConfirmarBorrarModalRealEstate extends Component
{
    public $rental;
    public $rentalId;
    public $title;
    public $isModalOpen = false;
    public $tagBorrado = false;

    public function openModal($rentalId,$title)
    {
        $this->isModalOpen = true;
        $this->rentalId = $rentalId;
        $this->title = $title;
        $this->tagBorrado = false;
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->tagBorrado = false;
    }
    public function eliminarRealEstate()
    {
        
        $rental = RealEstate::find($this->rentalId);
        $rental->delete();
        $this->tagEdito = true;
        $this->dispatch('rentalDeleted');
    }
    public function render()
    {
        return view('livewire.confirmar-borrar-modal-real-estate');
    }
}
