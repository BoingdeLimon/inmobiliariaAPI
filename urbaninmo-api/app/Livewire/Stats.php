<?php

namespace App\Livewire;

use Livewire\Component;

class Stats extends Component
{

    public $rentals = [];

    public function mount()
    {
        // FORMATO MES/DIA/AÑO
        $this->rentals = [
            ['start_date' => '10/01/2024', 'end_date' => '11/22/2024', 'name' => 'Rental 1'],
            ['start_date' => '12/02/2024', 'end_date' => '12/31/2024', 'name' => 'Rental 2'],
            ['start_date' => '01/02/2024', 'end_date' => '12/31/2024', 'name' => 'Rental 3'],
        ];
    }
    public function render()
    {
        return view('livewire.stats');
    }
}
