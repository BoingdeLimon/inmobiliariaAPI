<?php

namespace App\Livewire;

use App\Models\RealEstate;
use App\Models\Rentals;

use App\Models\Comments;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateComment extends Component
{
    public $comment;
    public $rating;
    public $titleRealEstate;
    public $user_id;
    public $id_rentals;

    public $isModalOpen = false;

    public function setRating($rating)
    {
        $this->rating = $rating;
    }
    public function openModal()
    {
        $this->isModalOpen = true;
    }
    protected $rules = [
        'comment' => 'required|min:6',
        'rating' => 'required| integer|between:1,5',
    ];

    public function closeModal()
    {
        $this->isModalOpen = false;
    }
    public function mount($id_rentals = null)
    {
        $this->id_rentals = $id_rentals;
        $this->user_id = Auth::user()->id;
        
        $this->titleRealEstate =  RealEstate::find(
            Rentals::find($id_rentals)->id_real_estate
        )->title;
    }
    public function submitComment()
    {
        $this->validate();

        Comments::create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => $this->user_id,
            'id_rentals' => $this->id_rentals,
        ]);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.create-comment');
    }
}
