<?php

namespace App\Livewire;

use Livewire\Component;

class Ribbon extends Component
{
    public string $text = '';

    public string $title = '';

    public $distance = 0;

    public function render()
    {
        return view('livewire.ribbon');
    }
}
