<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class EditarUsuariosModal extends Component
{
    use WithFileUploads;

    public $user;
    public $userId;
    public $name;
    public $email;
    public $phone;
    public $role;
    public $photo;
    public $photoAlreadySave;
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
        $this->photoAlreadySave = $photo;
        $this->tagEdito = false;
    }

    public function updatedPhoto()
    {
        if ($this->photo) {
            $filePath = $this->photo->store('photos', 'public');
            return basename($filePath);
        }
       return $this->photoAlreadySave;
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->tagEdito = false;
    }
    public function editarUsuario()
    {
        $photoName = $this->updatedPhoto();
        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
            'photo' => $photoName,
        ]);
        $this->tagEdito = true;
        $this->dispatch('editarUsuario');
    }
    public function render()
    {
        return view('livewire.editar-usuarios-modal');
    }
}
