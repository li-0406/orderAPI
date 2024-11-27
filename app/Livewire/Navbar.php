<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $title = 'IT 鐵人賽 - GOGO';
    public $name = '';
    public function render()
    {
        return view('livewire.create-post');
    }
}