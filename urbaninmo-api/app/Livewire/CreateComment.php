<?php

namespace App\Livewire;

use Livewire\Component;

class CreateComment extends Component
{
    public $comment;
    public $user_id;
    public $real_estate_id;
    public $isModalOpen = false;
    public $title_rental;
    public $rating;
    public function setRating($rating){
        $this->rating = $rating;
    }
    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }
    public function mount($title_rental){
        $this->title_rental = $title_rental;
    }

    public function render()
    {
        return view('livewire.create-comment');
    }
}
