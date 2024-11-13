<?php

namespace App\Livewire;

use App\Models\RealEstate;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Filters extends Component
{
    public $state;
    public $type;
    public $min_price;
    public $max_price;
    public $rooms;
    public $bathrooms;

    public $realEstates = [];

    public $tiposDeRealEstate = ["Casa", "Departamento", "Oficina"];
    public $estadosDeMexico = [
        "Aguascalientes",
        "Baja California",
        "Baja California Sur",
        "Campeche",
        "Ciudad de México",
        "Chiapas",
        "Chihuahua",
        "Coahuila",
        "Colima",
        "Durango",
        "Guanajuato",
        "Guerrero",
        "Hidalgo",
        "Jalisco",
        "Estado de México",
        "Michoacán",
        "Morelos",
        "Nayarit",
        "Nuevo León",
        "Oaxaca",
        "Puebla",
        "Querétaro",
        "Quintana Roo",
        "San Luis Potosí",
        "Sinaloa",
        "Sonora",
        "Tabasco",
        "Tamaulipas",
        "Tlaxcala",
        "Veracruz",
        "Yucatán",
        "Zacatecas",
    ];
    // protected $listeners = ['rentals'];

    public function mount()
    {
        // $this->realEstates = RealEstate::with(['address', 'photos'])->get();
        // $data = $this->realEstates;
    }

        

    public function applyFilters()
    {
        $query = RealEstate::with(['address', 'photos']);
        // Filtro por estado
        if ($this->state) {
            $query->whereHas('address', function ($q) {
                $q->where('state', $this->state);
            });
        }

        // Filtro por tipo
        if ($this->type) {
            $query->where('type', $this->type);
        }

        // Filtros de precios, eliminando comas antes de aplicarlos
        if (!empty($this->min_price)) {
            $minPrice = str_replace(',', '', $this->min_price);
            $query->where('price', '>=', $minPrice);
        }

        if (!empty($this->max_price)) {
            $maxPrice = str_replace(',', '', $this->max_price);
            $query->where('price', '<=', $maxPrice);
        }

        // Filtro por número de habitaciones
        if ($this->rooms) {
            $query->where('rooms', $this->rooms);
        }

        // Filtro por número de baños
        if ($this->bathrooms) {
            $query->where('bathrooms', $this->bathrooms);
        }

        // Ejecuta la consulta y asigna los resultados a `realEstates`
        $this->realEstates = $query->get();
        $this->emitTo('livewire.rentals','filtersApplied', $this->realEstates);
        // dd($this->realEstates);
    }


    public function render()
    {
        
        return view('livewire.filters');
    }
}
