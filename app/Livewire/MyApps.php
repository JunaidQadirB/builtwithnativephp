<?php

namespace App\Livewire;

use App\Models\App;
use Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MyApps extends Component
{
    use WithPagination;

    public ?string $status = '';

    public $appIdToDelete;

    public $appNameToDelete;

    public bool $appToDeleteIsPublished = true;

    public bool $confirmAppDeletion = false;

    public $queryString = [
        'q' => ['except' => ''],
        'status' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    #[On('delete-app')]
    public function promptToDeleteApp($app): void
    {


        $this->appIdToDelete = $app['id'];
        $this->appNameToDelete = $app['name'];
        $this->appToDeleteIsPublished = $app['status'] === 'Published';

     
        $this->confirmAppDeletion = true;
    }

    public function deleteApp(): void
    {
        App::find($this->appIdToDelete)->delete();
        $this->confirmAppDeletion = false;
    }

    public function render()
    {
        $apps = Auth::user()->apps()->withoutGlobalScope('publishedApps');

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
