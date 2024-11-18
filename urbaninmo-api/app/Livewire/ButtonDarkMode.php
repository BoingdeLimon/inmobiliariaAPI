<?php

namespace App\Livewire;

use Livewire\Component;

class ButtonDarkMode extends Component
{
    //! Cambios, de un repositorio de GitHub pude obtener el código para el dark mode
    //! sin la necesidad de tanto desastre y ahora es más fácil de implementar y sin bugs 
    public $darkMode = false;

    // public function mount()
    // {
    //     $this->darkMode = session()->get('darkMode', false);
    // }

    public function toggleDarkMode()
    {
        $this->darkMode = !$this->darkMode;
        // session()->put('darkMode', $this->darkMode);
    }

    public function render()
    {
        return view('livewire.button-dark-mode');
    }
}
