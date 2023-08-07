<?php

namespace App\Http\Livewire;

use App\Models\App;
use Livewire\Component;

class AppCard extends Component
{
    public App $app;
    public bool $shortDescription = true;
    public bool $price = true;
    public bool $publisher = true;
    public bool $ratings = true;
    public bool $categories = true;
    public bool $platform = true;

    public function render()
    {
        return view('livewire.app-card');
    }
}
