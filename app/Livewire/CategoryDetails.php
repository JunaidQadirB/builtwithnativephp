<?php

namespace App\Livewire;

use App\Models\AppCategory;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryDetails extends Component
{
    use withPagination;

    public AppCategory $category;

    public $searchTerm = '';

    public $queryString = [
        'searchTerm' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public $listeners = [
        'onSearch' => 'search',
        'onClearSearch' => 'clearSearchTerm',
    ];

    public function search($searchTerm, $selectedCategories)
    {
        $this->searchTerm = $searchTerm;
    }

    public function clearSearchTerm()
    {
        $this->searchTerm = '';
        $this->selectedCategories = [];
    }

    public function render()
    {
        $terms = explode(' ', $this->searchTerm);

        // search $terms in $category->apps by name, using like
        $apps = $this->category->apps()
            ->where(function ($query) use ($terms) {
                foreach ($terms as $term) {

                    $query->orWhere('name', 'like', "%{$term}%");
                }
            })
            ->paginate();

        return view('livewire.category-details', compact('apps'));
    }
}
