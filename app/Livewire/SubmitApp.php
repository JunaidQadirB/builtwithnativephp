<?php

namespace App\Livewire;

use Livewire\Component;

class SubmitApp extends Component
{
    public $name;

    public $icon;

    public $cover;

    public $short_description;

    public $description;

    public function render()
    {
        return view('livewire.submit-app');
    }
}
