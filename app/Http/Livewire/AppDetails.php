<?php

namespace App\Http\Livewire;

use App\Models\App;
use Livewire\Component;

class AppDetails extends Component
{
    public App $app;
    public function render()
    {
        return view('livewire.app-details');
    }
}
