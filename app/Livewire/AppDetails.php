<?php

namespace App\Livewire;

use App\Models\App;
use Livewire\Attributes\On;
use Livewire\Component;

class AppDetails extends Component
{
    public App $app;
    public int|null $appIdToDelete = null;

    public bool $confirmAppDeletion = false;

    #[On('delete-app')]
    public function promptToDeleteApp(): void
    {
        dd("sdfs");
//        $this->appIdToDelete = $appId;
        $this->confirmAppDeletion = true;
    }

    public function deleteApp($id): void
    {
        App::find($this->appIdToDelete)->delete();
    }

    public function render()
    {
        return view('livewire.app-details');
    }
}
