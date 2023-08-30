<?php

namespace App\Livewire;

use App\Models\App;
use App\Models\AppCategory;
use App\Models\AppPlatform;
use Livewire\Component;
use Livewire\WithPagination;

class AppsList extends Component
{
    use withPagination;

    public string $searchTerm = '';

    public array $platform = [];

    public array $selectedCategories = [];

    public array $selectedPlatforms = [];
    public $queryString = [
        'searchTerm' => ['except' => ''],
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
        $this->searchTerm = '';
        $this->selectedCategories = [];
    }

    public function selectAllCategories()
    {
        $this->selectedCategories = App::all()->pluck('slug')->toArray();
    }

    public function togglePlatform($platform): void
    {
        $platform = (object) $platform;

        if (in_array($platform->slug, $this->platform, true)) {
            $this->platform = array_diff($this->platform, [$platform->slug]);
        } else {
            $this->platform[] = $platform->slug;
        }
    }

    public function clearPlatform()
    {
        $this->platform = [];
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = AppCategory::all();

        $apps = App::search('name', $this->searchTerm);
        if (count($this->selectedCategories) > 0) {
            $apps = $apps->whereHas('categories', function ($query) {
                $query->orWhere('slug', '=', $this->selectedCategories);
            });
        }
        if ($this->platform) {
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
        $this->searchTerm = $searchTerm;
        $this->selectedCategories = $selectedCategories;
    }
}
