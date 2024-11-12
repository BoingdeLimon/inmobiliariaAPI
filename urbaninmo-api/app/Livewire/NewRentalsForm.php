<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Address;
use App\Models\RealEstate;
use App\Models\Photos;


class NewRentalsForm extends Component
{
    use WithFileUploads;
    public $user_id;
    public $title;
    public $description;
    public $size;
    public $rooms;
    public $bathrooms;
    public $type = "Casa";
    public $has_garage = false;
    public $has_garden = false;
    public $has_patio = false;

    public $address;
    public $zipcode;
    public $city;
    public $state;
    public $country;
    public $x;
    public $y;
    public $price;
    public $photo;
    public $is_occupied = false;
    public $isModalOpen = false;


    public function mount($user_id = null)
    {
        $this->user_id = $user_id;
    }

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'size' => 'required|numeric',
        'rooms' => 'required|integer',
        'bathrooms' => 'required|integer',
        'type' => 'required|string',
        'has_garage' => 'required|boolean',
        'has_garden' => 'required|boolean',
        'has_patio' => 'required|boolean',

        'address' => 'required|string|max:255',
        'zipcode' => 'required|string|max:20',
        'city' => 'required|string|max:100',
        'state' => 'required|string|max:100',
        'country' => 'required|string|max:100',
        'x' => 'required|numeric',
        'y' => 'required|numeric',

        'photo' => 'required|array',
        'photo.*' => 'string',

        'price' => 'required|numeric',
    ];


    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function submit()
    {
        if ($this->photo) {
            $photoNames = collect($this->photo)->map(function ($photo) {
                return $photo->getClientOriginalName();
            });
        }
        $this->photo = $photoNames;
        $this->validate();

        $address = Address::create([
            'address' => $this->address,
            'zipcode' => $this->zipcode,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'x' => $this->x,
            'y' => $this->y,
        ]);
        $id_address = $address->id;

        $rentals = RealEstate::create([
            'user_id' => $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            'size' => $this->size,
            'rooms' => $this->rooms,
            'bathrooms' => $this->bathrooms,
            'type' => $this->type,
            'has_garage' => $this->has_garage,
            'has_garden' => $this->has_garden,
            'has_patio' => $this->has_patio,
            'id_address' => $id_address,
            'price' => $this->price,
            'is_occupied' => $this->is_occupied,
        ]);
        foreach ($this->photo as $photoFile) {
            Photos::create([
                'id_real_estate' => $rentals->id,
                'photo' => $photoFile 
            ]);
        }

        $this->reset();
    }

    public function render()
    {
        return view('livewire.new-rentals-form');
    }
}
