<?php

namespace App\Http\Livewire;

use App\Models\AppCategory;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm = '';
    public $searchInCategories = [];
    public $isOpen = false;

    public function clearSearchTerm()
    {
        $this->searchTerm = '';
        $this->emit('onClearSearch');
    }
    public function toggleSearchInCategories()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function clearSearchInCategories(): void
    {
        $this->searchInCategories = [];
    }

    public function selectAllCategories()
    {

    }

    public function search()
    {
        $this->emit('onSearch', $this->searchTerm,
            $this->searchInCategories
        );
    }

    public function render()
    {
        $categories = AppCategory::all();
        return view('livewire.search', compact('categories'));
    }
}
