<?php

namespace App\Livewire;

use App\Models\RealEstate;
use Livewire\Component;

class Rentals extends Component
{
    public $rentals = [];
    public $currentPage = 1;
    public $perPage =2 ; // Número de elementos por página
    public $totalPages;

    public function mount()
    {
        $this->loadRentals();
    }

    public function loadRentals()
    {
        $totalRentals = RealEstate::count();
        $this->totalPages = ceil($totalRentals / $this->perPage);
        $this->rentals = RealEstate::with(['address', 'photos'])
            ->offset(($this->currentPage - 1) * $this->perPage)
            ->limit($this->perPage)
            ->get()
            ->toArray();
    }

    public function goToPage($page)
    {
        if ($page > 0 && $page <= $this->totalPages) {
            $this->currentPage = $page;
            $this->loadRentals();
        }
    }

    public function render()
    {
        return view('livewire.rentals');
    }
}
