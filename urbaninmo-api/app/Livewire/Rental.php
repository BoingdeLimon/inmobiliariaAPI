<?php

namespace App\Livewire;

use Livewire\Component;

class Rental extends Component
{
    public $rentalId;
    public $rental;

    public $name;
    public $email;
    public $phone;
    public $message;
    public $rentals = [];
    public function mount($rentalId = null)
    {
        $this->rentals = [
            [
                'id' => 1,
                'price' => '20,000 MXN',
                'location' => 'Club de Golf Tres Marías',
                'size' => '150 m²',
                'rooms' => '3 Habitaciones',
                'bathrooms' => '2 Baños',
                'amenities' => ['WiFi', 'Parking', 'Pool'],
                'image' => 'https=>//img10.naventcdn.com/avisos/resize/18/01/41/56/09/41/1200x1200/1125611697.jpg?isFirstImage=true',
            ],
            [
                'id' => 2,
                'price' => '15,000 MXN',
                'location' => 'Lomas de Angelópolis',
                'size' => '120 m²',
                'rooms' => '2 Habitaciones',
                'bathrooms' => '2 Baños',
                'amenities' => ['WiFi', 'Gym'],
                'image' => 'https://img10.naventcdn.com/avisos/resize/18/01/41/56/09/41/1200x1200/1125611697.jpg?isFirstImage=true',
            ],
            [
                'id' => 3,
                'price' => '20,000 MXN',
                'location' => 'Club de Golf Tres Marías',
                'size' => '150 m²',
                'rooms' => '3 Habitaciones',
                'bathrooms' => '2 Baños',
                'amenities' => ['WiFi', 'Parking', 'Pool'],
                'image' => 'https=>//img10.naventcdn.com/avisos/resize/18/01/41/56/09/41/1200x1200/1125611697.jpg?isFirstImage=true',
            ],
            [
                'id' => 4,
                'price' => '15,000 MXN',
                'location' => 'Lomas de Angelópolis',
                'size' => '120 m²',
                'rooms' => '2 Habitaciones',
                'bathrooms' => '2 Baños',
                'amenities' => ['WiFi', 'Gym'],
                'image' => 'https://img10.naventcdn.com/avisos/resize/18/01/41/56/09/41/1200x1200/1125611697.jpg?isFirstImage=true',
            ],
            [
                'id' => 5,
                'price' => '20,000 MXN',
                'location' => 'Club de Golf Tres Marías',
                'size' => '150 m²',
                'rooms' => '3 Habitaciones',
                'bathrooms' => '2 Baños',
                'amenities' => ['WiFi', 'Parking', 'Pool'],
                'image' => 'https=>//img10.naventcdn.com/avisos/resize/18/01/41/56/09/41/1200x1200/1125611697.jpg?isFirstImage=true',
            ],
            [
                'id' => 6,
                'price' => '15,000 MXN',
                'location' => 'Lomas de Angelópolis',
                'size' => '120 m²',
                'rooms' => '2 Habitaciones',
                'bathrooms' => '2 Baños',
                'amenities' => ['WiFi', 'Gym'],
                'image' => 'https://img10.naventcdn.com/avisos/resize/18/01/41/56/09/41/1200x1200/1125611697.jpg?isFirstImage=true',
            ],
        ];
        $this->rentalId = $rentalId;
        $this->rental = collect($this->rentals)->firstWhere('id', $this->rentalId);
    }
    public function render()
    {
        return view('livewire.rental', [
            'rental' => $this->rental, 
        ]);
    }
}
