<?php

namespace App\Livewire;

use App\Models\RealEstate;
use App\Models\Comments;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateComment extends Component
{
    public $comment;
    public $rating;
    public $titleRealEstate;
    public $user_id;
    public $id_real_estate;

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
    public function mount($id_real_estate = null)
    {
        $this->id_real_estate = $id_real_estate;
        $this->user_id = Auth::user()->id;
        $this->titleRealEstate = RealEstate::find($id_real_estate)->title;
    }
    public function submitComment()
    {
        $this->validate();

        Comments::create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => $this->user_id,
            'id_real_estate' => $this->id_real_estate,
        ]);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.create-comment');
    }
}
