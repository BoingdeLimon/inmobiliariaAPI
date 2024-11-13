<?php

namespace App\Livewire;

use App\Models\RealEstate;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Rentals extends Component
{
    
    public $rentals = [];

    // Escuchar el evento 'filtersApplied' emitido por el componente Filters
    protected $listeners = ['filtersApplied' => 'updateRealEstates'];

    public function mount()
    {
        // Inicializa las propiedades cuando se cargue el componente
        $this->rentals = RealEstate::with(['address', 'photos'])->get();
    }

    // Método para actualizar la lista de propiedades cuando se recibe el evento
    public function updateRealEstates($realEstates)
    {
        $this->rentals = $realEstates;
    }

    public function render()
    {
        return view('livewire.rentals');
    }
}