<?php

namespace App\Livewire;

use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MyApps extends Component
{
    use WithPagination;

    public ?string $status = '';

    public $queryString = [
        'q' => ['except' => ''],
        'status' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        $apps = Auth::user()->apps()->withoutGlobalScopes();

        $apps = match ($this->status) {
            'draft' => $apps->draft(),
            'publish' => $apps->publish(),
            'reject' => $apps->reject(),
            default => $apps,
        };

        $apps = $apps->paginate();

        return view('livewire.my-apps', compact('apps'));
    }
}
