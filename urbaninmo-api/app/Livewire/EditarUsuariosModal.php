<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;

class EditarUsuariosModal extends Component
{
    public $user;
    public $userId;
    public $name;
    public $email;
    public $phone;
    public $role;
    public $photo;
    public $isModalOpen = false;
    public $tagEdito = false;

    public function openModal($userId, $name, $email, $phone, $role, $photo)
    {
        $this->isModalOpen = true;
        $this->userId = $userId;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->role = $role;
        $this->photo = $photo;
        $this->tagEdito = false;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->tagEdito = false;
    }
    public function editarUsuario()
    {
        
        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
        ]);
        $this->tagEdito = true;
        $this->dispatch('editarUsuario');
    }
    public function render()
    {
        return view('livewire.editar-usuarios-modal');
    }
}
