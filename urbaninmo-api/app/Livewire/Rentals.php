<?php

namespace App\Livewire;

use App\Models\RealEstate;
use Livewire\Component;

class Rentals extends Component
{
    public $rentals = [];
    public $filteredRentals = []; // Almacena todas las propiedades filtradas
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
            // Hay filtros?
            if (!empty($this->filteredRentals)) {
                $this->paginateFilteredRentals();
            } else {

                $this->loadRentals();
            }
        }
    }

    public function updateRealEstates($realEstates)
    {
        $this->isLoading = true;
        $this->filteredRentals = $realEstates;
        $this->totalPages = ceil(count($this->filteredRentals) / $this->perPage);
        $this->currentPage = 1;
        $this->paginateFilteredRentals();
        $this->isLoading = false;
    }

    private function paginateFilteredRentals()
    {
        $offset = ($this->currentPage - 1) * $this->perPage;
        $this->rentals = array_slice($this->filteredRentals, $offset, $this->perPage);
    }

    public function render()
    {
        return view('livewire.rentals');
    }
}