<?php

namespace App\Http\Livewire;

use App\Models\App;
use Livewire\Component;

class AppCard extends Component
{
    public App $app;
    public bool $showShortDescription = true;
    public bool $showPrice = true;
    public bool $showPublisher = true;
    public bool $showRatings = true;
    public bool $showCategories = true;
    public bool $showPlatform = true;

    public function render()
    {
        return view('livewire.app-card');
    }
}
