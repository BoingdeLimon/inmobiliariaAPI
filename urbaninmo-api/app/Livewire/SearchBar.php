<?php

namespace App\Livewire;

use App\Models\RealEstate;
use Livewire\Component;

class SearchBar extends Component
{
    public $search = '';
    public $realEstates = [];

    public function updatedSearch()
    {
        // Llamamos a 'applySearch' solo si 'search' tiene texto
        if (!empty($this->search)) {
            $this->applySearch(); 
        } else {
            $this->realEstates = []; 
        }
    }

    // Método que realiza la búsqueda en la base de datos
    public function applySearch()
    {
        $query = RealEstate::with(['address', 'photos']);
        if (!empty($this->search)) {
            $query->where(function($query) {
                $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($this->search) . '%'])
                      ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($this->search) . '%']);
            });
        }
        $this->realEstates = $query->get();
    }
    // Redirect
    public function redirectToRental($id)
{
    return redirect()->route('rental.show', ['id' => $id]);
}

    public function render()
    {
        return view('livewire.search-bar');
    }
}
