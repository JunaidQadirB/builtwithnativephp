<?php

namespace App\Http\Livewire;

use App\Models\App;
use App\Models\AppCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AppsList extends Component
{
    use withPagination;

    public string $searchTerm = '';
    public $selectedCategories = [];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $queryString = [
        'searchTerm' => ['except' => ''],
        'selectedCategories' => ['except' => []],
        'page' => ['except' => 1],
    ];
    public $listeners = [
        'onSearch' => 'search',
        'onClearSearch' => 'clearSearchTerm',
        'onSelectAllCategories' => 'selectAllCategories',
    ];


    public function search($searchTerm, $selectedCategories)
    {
        $this->searchTerm = $searchTerm;
        $this->selectedCategories = $selectedCategories;
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

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = AppCategory::all();

        $apps = App::search('name', $this->searchTerm);
        if (count($this->selectedCategories) > 0) {
            $apps = $apps->whereHas('categories', function ($query) {
                $query->where('slug', '=', $this->selectedCategories);
            });
        }
        $apps = $apps->paginate();

        return view('livewire.apps-list', compact('apps', 'categories'));
    }
}
