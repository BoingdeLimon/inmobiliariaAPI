<?php

namespace App\Livewire;

use App\Models\RealEstate;
use Livewire\Component;

class Rentals extends Component
{
    public $rentals = [];
    public $filteredRentals = []; // Almacena todas las propiedades recibidas
    public $currentPage = 1;
    public $perPage = 4; 
    public $totalPages;
    public $isLoading = false;
    protected $listeners = ['filtersApplied' => 'updateRealEstates'];

    public function mount()
    {
        $this->loadRentals();
    }

    public function loadRentals()
    {
        $this->isLoading = true;
        $totalRentals = RealEstate::count();
        $this->totalPages = ceil($totalRentals / $this->perPage);
        $this->rentals = RealEstate::with(['address', 'photos'])
            ->offset(($this->currentPage - 1) * $this->perPage)
            ->limit($this->perPage)
            ->get()
            ->toArray();
        $this->isLoading = false;
    }

    public function goToPage($page)
    {
        if ($page > 0 && $page <= $this->totalPages) {
            $this->currentPage = $page;
            $this->paginateFilteredRentals();
        }
    }

    public function updateRealEstates($realEstates)
    {
        $this->isLoading = true;
        $this->filteredRentals = $realEstates; // Almacena todas las propiedades filtradas
        $this->totalPages = ceil(count($this->filteredRentals) / $this->perPage); // Calcula las páginas totales
        $this->currentPage = 1; // Reinicia la paginación a la primera página
        $this->paginateFilteredRentals(); // Pagina las propiedades recibidas
        $this->isLoading = false;
    }

    private function paginateFilteredRentals()
    {
        // Divide las propiedades filtradas según la página actual y el tamaño de página
        $offset = ($this->currentPage - 1) * $this->perPage;
        $this->rentals = array_slice($this->filteredRentals, $offset, $this->perPage);
    }

    public function render()
    {
        return view('livewire.rentals');
    }
}