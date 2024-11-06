<?php

namespace App\Livewire;

use App\Http\Controllers\RealEstateController;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewRentalsForm extends Component
{
    use WithFileUploads;
    public $user_id = 0;
    public $title = "";
    public $description = "";
    public $size = 0;
    public $rooms = 0;
    public $bathrooms = 0;
    public $type = "Casa";
    public $has_garage = false;
    public $has_garden = false;
    public $has_patio = false;

    public $address = "";
    public $zipcode = "";
    public $city = "";
    public $state = "";
    public $country = "";
    public $x = 0.0;
    public $y = 0.0;

    public $price = 0.0;
    public $photos;
    public $file;


    public $data = [];

    public $is_occupied = false;

    public function mount($user_id = null)
    {
        $this->user_id = $user_id;
    }

    // protected $rules = [
    //     'title' => 'required|string|max:255',
    //     'description' => 'nullable|string',
    //     'size' => 'required|numeric',
    //     'rooms' => 'required|integer',
    //     'bathrooms' => 'required|integer',
    //     'type' => 'required|string',
    //     'has_garage' => 'required|boolean',
    //     'has_garden' => 'required|boolean',
    //     'has_patio' => 'required|boolean',

    //     'address' => 'required|string|max:255',
    //     'zipcode' => 'required|string|max:20',
    //     'city' => 'required|string|max:100',
    //     'state' => 'required|string|max:100',
    //     'country' => 'required|string|max:100',
    //     'x' => 'required|numeric',
    //     'y' => 'required|numeric',

    //     'photo' => 'required|array',
    //     'photo.*' => 'string',

    //     'price' => 'required|numeric',
    // ];
    public function submit(RealEstateController $realEstateController)
    {
        $fileName = $this->photos->getClientOriginalName();

        dd($fileName);

        // if ($this->photos) {
        //     foreach ($this->photos as $photo) {
        //         $fileName = $photo->getClientOriginalName();
        //         dd($fileName); // Puedes usar dd() o almacenarlo en una variable para usarlo después
        //     }
        // } else {

        //     dd("no hay nada");
        // }
        // // dd($this->photo[0]);
        // dd(
        //     $this->user_id,
        //     $this->title,
        //     $this->description,
        //     $this->size,
        //     $this->rooms,
        //     $this->bathrooms,
        //     $this->type,
        //     $this->has_garage,
        //     $this->has_garden,
        //     $this->has_patio,
        //     $this->address,
        //     $this->zipcode,
        //     $this->city,
        //     $this->state,
        //     $this->country,
        //     $this->x,
        //     $this->y,
        //     $this->photo,
        //     $this->photos,

        //     $this->price
        // );


        // $this->rooms = floatval($this->rooms);
        // $this->bathrooms = floatval($this->bathrooms);

        // $this->size = floatval($this->size);
        // $this->x = floatval($this->x);

        // $this->y = floatval($this->y);


        // $request = new Request([
        //     'user_id' => $this->user_id,
        //     'title' => $this->title,
        //     'description' => $this->description,
        //     'size' => $this->size,
        //     'rooms' => $this->rooms,
        //     'bathrooms' => $this->bathrooms,
        //     'type' => $this->type,
        //     'has_garage' => $this->has_garage,
        //     'has_garden' => $this->has_garden,
        //     'has_patio' => $this->has_patio,
        //     'address' => $this->address,
        //     'zipcode' => $this->zipcode,
        //     'city' => $this->city,
        //     'state' => $this->state,
        //     'country' => $this->country,
        //     'x' => $this->x,
        //     'y' => $this->y,
        //     'photo' => $this->photos,
        //     'price' => $this->price,
        //     'is_occupied' => $this->is_occupied
        // ]);
        // $this->data = $realEstateController->newRental($request);
        // dd($this->data);
        // $this->emit('cnuevoAlquilerCreado', $this->data);

    }

    public function render()
    {
        return view('livewire.new-rentals-form');
    }
}
