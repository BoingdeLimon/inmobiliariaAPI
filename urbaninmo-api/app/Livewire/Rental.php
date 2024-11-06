<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\RealEstateController;
use Illuminate\Http\Request;

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

    public $address_id;
    public $address;
    public $zipcode;
    public $city;
    public $state;
    public $country;
    public $x;
    public $y;
    public $address_created_at;
    public $address_updated_at;

    public $photos = [];



    public function mount(RealEstateController $realEstateController, $rentalId = null)
    {
        $this->rentalId = $rentalId;
        $request = new Request(['id' => $this->rentalId]);
        $data = $realEstateController->listAllRentals($request);
        $rental = $data->original['real_estate'][0];

        $this->user_id = $rental['user_id'];
        $this->title = $rental['title'];
        $this->description = $rental['description'];
        $this->size = $rental['size'];
        $this->rooms = $rental['rooms'];
        $this->bathrooms = $rental['bathrooms'];
        $this->type = $rental['type'];
        $this->has_garage = $rental['has_garage'];
        $this->has_garden = $rental['has_garden'];
        $this->has_patio = $rental['has_patio'];
        $this->id_address = $rental['id_address'];
        $this->price = $rental['price'];
        $this->is_occupied = $rental['is_occupied'];
        $this->pdf = $rental['pdf'];
        $this->created_at = $rental['created_at'];
        $this->updated_at = $rental['updated_at'];

        $this->address_id = $rental['address']['id'];
        $this->address = $rental['address']['address'];
        $this->zipcode = $rental['address']['zipcode'];
        $this->city = $rental['address']['city'];
        $this->state = $rental['address']['state'];
        $this->country = $rental['address']['country'];
        $this->x = $rental['address']['x'];
        $this->y = $rental['address']['y'];
        $this->address_created_at = $rental['address']['created_at'];
        $this->address_updated_at = $rental['address']['updated_at'];

         $this->photos = $rental['photos'];
    }



    public function render()
    {
        return view('livewire.rental');
    }
}
