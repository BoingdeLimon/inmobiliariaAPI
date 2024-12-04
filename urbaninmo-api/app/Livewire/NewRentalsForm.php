<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Address;
use App\Models\RealEstate;
use App\Models\Photos;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;

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

    public $photosAlreadySave;

    public $realEstateId;

    public function update($user_id = null, $realEstateId = null)
    {
        $this->selectedRealEstate($user_id, $realEstateId);
    }
    public function mount($user_id = null, $realEstateId = null)
    {
        $this->selectedRealEstate($user_id, $realEstateId);
    }

    public function selectedRealEstate($user_id = null, $realEstateId = null)
    {
        $this->user_id = $user_id;
        $this->realEstateId = $realEstateId;
        if ($realEstateId) {
            $realEstate = RealEstate::find($realEstateId);

            if ($realEstate) {
                $this->title = $realEstate->title;
                $this->description = $realEstate->description;
                $this->size = $realEstate->size;
                $this->rooms = $realEstate->rooms;
                $this->bathrooms = $realEstate->bathrooms;
                $this->type = $realEstate->type;
                $this->has_garage = $realEstate->has_garage;
                $this->has_garden = $realEstate->has_garden;
                $this->has_patio = $realEstate->has_patio;
                $this->price = $realEstate->price;
                $this->is_occupied = $realEstate->is_occupied;

                $address = $realEstate->address;
                $this->address = $address->address;
                $this->zipcode = $address->zipcode;
                $this->city = $address->city;
                $this->state = $address->state;
                $this->country = $address->country;
                $this->x = $address->x;
                $this->y = $address->y;

                $photos = $realEstate->photos;
                $this->photosAlreadySave = $photos;
            }
        }
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

        // 'photo' => 'required|array',
        // 'photo.*' => 'string',

        'photo' => 'required|array',
        'photo.*' => 'image|mimes:jpg,jpeg,png|max:2048',

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

        if ($this->realEstateId) {
            $this->updateRealEstate();
        } else {
            $this->saveRealEstate();
        }
        $this->reset();
    }

    public function newPhoto($id_real_estate)
    {
        $photoNames = [];
        if ($this->photo) {
            foreach ($this->photo as $photoFile) {
                $filePath = $photoFile->store('photos', 'public');
                $photoNames[] = basename($filePath);
            }
        }
        $this->photo = $photoNames;
        foreach ($this->photo as $photoFile) {
            Photos::create([
                'id_real_estate' => $id_real_estate,
                'photo' => $photoFile
            ]);
        }
    }
    public function saveRealEstate()
    {
        // if ($this->photo) {
        //     $photoNames = collect($this->photo)->map(function ($photo) {
        //         return $photo->getClientOriginalName();
        //     });
        // }
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

        $realEstates = RealEstate::create([
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

        $this->newPhoto($realEstates->id);
    }

    public function deletePhoto($photoId)
    {
        $photo = Photos::find($photoId);
        $photoName = $photo->photo;
        Storage::disk('public')->delete('photos/' . $photoName);
        $photo->delete();
        $this->photosAlreadySave = Photos::where('id_real_estate', $this->realEstateId)->get();
    }

    public function updateRealEstate()
    {
        $address = Address::find($this->realEstateId);
        $address->update([
            'address' => $this->address,
            'zipcode' => $this->zipcode,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'x' => $this->x,
            'y' => $this->y,
        ]);

        $realEstate = RealEstate::find($this->realEstateId);
        $realEstate->update([
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
            'id_address' => $address->id,
            'price' => $this->price,
            'is_occupied' => $this->is_occupied,
        ]);

        $this->newPhoto($this->realEstateId);
    }

    public function render()
    {
        return view('livewire.new-rentals-form');
    }
}
