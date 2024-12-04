<?php

namespace App\Livewire;

use App\Models\RealEstate;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Rentals extends Component
{
    public $rentals = [];
    public $isLoading = false;  // Variable para controlar el estado de carga

    // Escuchar el evento 'filtersApplied' emitido por el componente Filters
    protected $listeners = ['filtersApplied' => 'updateRealEstates'];

    public function mount()
    {
        // Inicializa las propiedades cuando se cargue el componente
        $this->loadRentals();  // Cargar los alquileres al montar el componente
    }

    public function loadRentals()
    {
        $this->isLoading = true;  // Activar el estado de carga

        // Simulación de una consulta a la base de datos (puedes usar tu lógica real)
        $this->rentals = RealEstate::with(['address', 'photos'])->get();

        $this->isLoading = false;  // Desactivar el estado de carga
    }

    // Método para actualizar la lista de propiedades cuando se recibe el evento
    public function updateRealEstates($realEstates)
    {
        $this->isLoading = true;  // Activar el estado de carga
        $this->rentals = $realEstates;
        $this->isLoading = false;  // Desactivar el estado de carga
    }

    public function render()
    {
        return view('livewire.rentals');
    }
}
