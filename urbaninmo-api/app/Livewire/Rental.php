<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\RealEstateController;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\RealEstate;
use App\Models\Messages;
use App\Models\Photos;
use App\Models\User;


class Rental extends Component
{

    public $rentalId;
    public $user_id;

    public $title;
    public $description;
    public $size;
    public $rooms;
    public $bathrooms;
    public $type;
    public $has_garage;
    public $has_garden;
    public $has_patio;
    
    public $id_address;
    public $price;
    public $is_occupied;
    public $pdf;
    public $created_at;
    public $updated_at;

    public $address;
    public $zipcode;
    public $city;
    public $state;
    public $country;
    public $x;
    public $y;

    public $photos = [];



    public function mount($rentalId = null)
    {
        $this->rentalId = $rentalId;
        $rental = RealEstate::find($this->rentalId);
        $address = Address::find($rental->id_address);
        $photo = Photos::where('id_real_estate', $rental->id)->get();
       
        $this->user_id = $rental->user_id;
        $this->title = $rental->title;
        $this->description = $rental->description;
        $this->size = $rental->size;
        $this->rooms = $rental->rooms;
        $this->bathrooms = $rental->bathrooms;
        $this->type = $rental->type;
        $this->has_garage = $rental->has_garage;
        $this->has_garden = $rental->has_garden;
        $this->has_patio = $rental->has_patio;
        $this->price = $rental->price;
        $this->is_occupied = $rental->is_occupied;
        $this->pdf = $rental->pdf;
        $this->created_at = $rental->created_at;
        $this->updated_at = $rental->updated_at;
        $this->id_address = $rental->id_address;
        $this->address = $address->address;
        $this->zipcode = $address->zipcode;
        $this->city = $address->city;
        $this->state = $address->state;
        $this->country = $address->country;
        $this->x = $address->x;
        $this->y = $address->y;
        
        foreach ($photo as $p) {
            $this->photos[] = $p->photo;
        }

        
    }



    public function render()
    {
        return view('livewire.rental');
    }
}
