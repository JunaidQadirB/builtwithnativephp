<?php

namespace App\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $searchTerm = '';

    public $selectedCategories = [];

    public $categories = [];

    public $isOpen = false;

    public $showCategories = true;

    public function clearSearchTerm(): void
    {
        $this->searchTerm = '';
        $this->dispatch('onClearSearch');
    }

    public function toggleCategoriesDropdown(): void
    {
        $this->isOpen = ! $this->isOpen;
    }

    public function unSelectAllCategories(): void
    {
        $this->selectedCategories = [];
    }

    public function search(): void
    {
        $this->dispatch('onSearch', $this->searchTerm,
            $this->selectedCategories
        );
    }

    public function render()
    {
        return view('livewire.search');
    }
}
