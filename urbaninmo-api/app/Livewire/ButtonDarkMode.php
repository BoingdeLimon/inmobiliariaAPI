<?php

namespace App\Livewire;

use Livewire\Component;

class ButtonDarkMode extends Component
{
    public $darkMode = false;

    public function mount()
    {
        $this->darkMode = session()->get('darkMode', false);
    }

    public function toggleDarkMode()
    {
        $this->darkMode = !$this->darkMode;
        session()->put('darkMode', $this->darkMode);
    }

    public function render()
    {
        return view('livewire.button-dark-mode');
    }
}
