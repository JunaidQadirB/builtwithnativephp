<?php

namespace App\Livewire;

use App\Models\App;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AppCard extends Component
{
    public ?string $class = '';

    public App $app;

    public bool $showShortDescription = true;

    public bool $showPrice = true;

    public bool $showPublisher = true;

    public bool $showStatus = false;

    public bool $showRatings = true;

    public bool $showCategories = true;

    public bool $showPlatform = true;

    #[Computed]
    public function statusColor($status): string
    {
        return match ($status) {
            'Published' => 'border border-green-200 bg-green-50 text-green-600 dark:bg-green-900 dark:text-green-300',
            'Rejected' => 'border border-red-200 bg-red-50 text-red-600 dark:bg-red-900 dark:text-red-300',
            default => 'border border-yellow-200 bg-yellow-50 text-yellow-600 dark:bg-yellow-900 dark:text-yellow-300',
        };
    }

    public function render()
    {
        return view('livewire.app-card');
    }
}
