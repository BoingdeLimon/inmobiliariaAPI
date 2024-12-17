<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;

class ConfirmarBorrarModal extends Component
{   
    public $user;
    public $userId;
    public $name;
    public $isModalOpen = false;
    public $tagBorrado = false;
    
    public function openModal($userId,$name)
    {
        $this->isModalOpen = true;
        $this->userId = $userId;
        $this->name = $name;
        $this->tagBorrado = false;
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->tagBorrado = false;
    }
    public function eliminarUsuario()
    {
        
        $user = User::find($this->userId);
        $user->delete();
        $this->tagBorrado = true;
        $this->dispatch('eliminarUsuario');
    }
   
    public function render()
    {
        return view('livewire.confirmar-borrar-modal');
    }
}
