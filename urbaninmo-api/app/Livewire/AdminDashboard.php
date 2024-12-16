<?php

namespace App\Livewire;

use Livewire\Component;

class AdminDashboard extends Component
{   
    public $estadoUsuarios = false;
    public $estadoRentals = false;

    public function botonUsuarios()
    {
        $this->estadoUsuarios = true;
        $this->estadoRentals = false;
    }

    public function botonRentals()
    {
        $this->estadoUsuarios = false;
        $this->estadoRentals = true;
    }
    public function logout()
    {
        // Auth::logout();
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}
