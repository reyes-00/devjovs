<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VerVacante extends Component

{
    public $vacante;
    
    public function render()
    {
        return view('livewire.ver-vacante');
    }
}
