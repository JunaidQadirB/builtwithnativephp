<?php

namespace App\Http\Livewire;

use App\Models\App;
use Livewire\Component;
use Livewire\WithPagination;

class AppsList extends Component
{
    use withPagination;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $queryString = [
        'searchTerm' => ['except' => ''],
        'searchInCategories' => ['except' => []],
        'page' => ['except' => 1],
    ];
    public $listeners = [
        'onSearch' => 'search',
        'onClearSearch' => 'clearSearchTerm'
    ];
    public string $searchTerm = '';
    public $searchInCategories = [];

    public function search($searchTerm, $searchInCategories)
    {
        $this->searchTerm = $searchTerm;
        $this->searchInCategories = $searchInCategories;
    }

    public function clearSearchTerm()
    {
        $this->searchTerm = '';
        $this->searchInCategories = [];
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apps = App::search('name', $this->searchTerm);
        if (count($this->searchInCategories) > 0) {
            $apps = $apps->whereHas('categories', function ($query) {
                $query->where('slug', '=', $this->searchInCategories);
            });
        }
        $apps = $apps->paginate();
        return view('livewire.apps-list', compact('apps'));
    }
}
