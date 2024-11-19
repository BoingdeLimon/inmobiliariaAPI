<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\User; // Ensure the User model is imported
use App\Http\Controllers\UserController;

class UserList extends Component
{
    
    public $users;
    #[On('userDeleted', 'editarUsuario')]
    public function mount()
    {
        $this->users = User::all(); // Assign the fetched users to the class property
    }
    
   
    public function borrar($id)
    {
        if($id){
            $controller = new UserController();
            $controller->destroy($id);
            $this->dispatch('userDeleted');
        }else{
            session()->flash('error', 'No se ha podido borrar el usuario');
        }
    }  
 
    #[On('editarUsuario', 'userDeleted')]
    public function render()
    {
        return view('livewire.user-list', [
            'users' => $this->users, // Pass the users to the view
        ]);
    }
}
