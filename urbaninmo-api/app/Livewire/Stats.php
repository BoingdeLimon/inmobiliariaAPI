<?php

namespace App\Livewire;

use Livewire\Component;

class Stats extends Component
{

    public $rentals = [];

    public function mount()
    {
        // FORMATO YYYY/DD/MM
        $this->rentals = [
            ['id' => '1', 'user_id' => '1', 'name' => 'Rental 1', 'rent_start' => '2024-01-11', 'end' => '2024-4-11', 'reason_end' => null, 'created_at' => '2024-12-10T10:44:27.000000Z', 'updated_at' => '2024-12-10T10:44:27.000000Z'],
            ['id' => '2', 'user_id' => '2', 'name' => 'Rental 2', 'rent_start' => '2024-01-15', 'end' => '2024-12-15', 'reason_end' => null, 'created_at' => '2024-12-10T10:46:15.000000Z', 'updated_at' => '2024-12-10T10:46:15.000000Z'],
            ['id' => '3', 'user_id' => '3', 'name' => 'Rental 3', 'rent_start' => '2024-03-20', 'end' => '2024-6-20', 'reason_end' => null, 'created_at' => '2024-12-10T10:48:03.000000Z', 'updated_at' => '2024-12-10T10:48:03.000000Z'],
            ['id' => '4', 'user_id' => '4', 'name' => 'Rental 4', 'rent_start' => '2024-07-25', 'end' => '2024-12-25', 'reason_end' => null, 'created_at' => '2024-12-10T10:50:17.000000Z', 'updated_at' => '2024-12-10T10:50:17.000000Z'],
            ['id' => '5', 'user_id' => '5', 'name' => 'Rental 5', 'rent_start' => '2024-09-01', 'end' => '2024-10-30', 'reason_end' => null, 'created_at' => '2024-12-10T10:52:09.000000Z', 'updated_at' => '2024-12-10T10:52:09.000000Z'],
        ];
        
    }
    public function render()
    {
        return view('livewire.stats');
    }
}
