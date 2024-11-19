<?php

namespace App\Livewire;

use Livewire\Component;

class DropdownMenu extends Component
{   
    public $estadoMenu = false;
    public function abrirMenu()
    {
        $this->estadoMenu = true;
       
    }
    public function cerrarMenu()
    {
        $this->estadoMenu = false;
    }
    public function render()
    {
        return view('livewire.dropdown-menu');
    }
}
