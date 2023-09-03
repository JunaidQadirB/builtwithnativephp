<?php

namespace App\Livewire;

use App\Models\App;
use App\Models\AppCategory;
use App\Models\AppPlatform;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AppsList extends Component
{
    use withPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public array $platform = [];

    public array $selectedCategories = [];

    public array $selectedPlatforms = [];

    public $queryString = [
        'search' => ['except' => ''],
        'platform' => ['except' => []],
        'selectedCategories' => ['except' => []],
        'page' => ['except' => 1],
    ];

    public $listeners = [
        'onSearch' => 'search',
        'onClearSearch' => 'clearSearchTerm',
        'onSelectAllCategories' => 'selectAllCategories',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearSearchTerm()
    {
        $this->search = '';
        $this->selectedCategories = [];
    }

    public function selectAllCategories()
    {
        $this->selectedCategories = App::all()->pluck('slug')->toArray();
    }

    public function togglePlatform(string $platform)
    {
        if (in_array($platform, $this->platform)) {
            $this->platform = array_diff($this->platform, [$platform]);
            return;
        }
        $this->platform[] = $platform;
    }

    public function clearPlatform()
    {
        $this->platform = [];
    }

    public function render()
    {
        $categories = AppCategory::all();

        $apps = App::search('name', $this->search);
        if (count($this->selectedCategories) > 0) {
            $apps = $apps->whereHas('categories', function ($query) {
                $query->orWhere('slug', '=', $this->selectedCategories);
            });
        }
        if (count($this->platform) > 0) {
            $apps = $apps->whereHas('platforms', function ($query) {
                $query->whereIn('slug', $this->platform);
            });
        }
        $apps = $apps->paginate();

        $platforms = AppPlatform::all();

        return view('livewire.apps-list', compact('apps', 'categories', 'platforms'));
    }

    public function search($searchTerm, $selectedCategories)
    {
        $this->search = $searchTerm;
        $this->selectedCategories = $selectedCategories;
    }
}
