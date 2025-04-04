<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchAutocomplete extends Component
{
    public $query = '';
    public $results = [];
    public $hasResults = false;

    public function updatedQuery()
    {
        $this->search();
    }

    public function search()
    {
        if ($this->query !== '') {
            $this->results = User::where('name', 'like', '%' . $this->query . '%')->get();
            $this->hasResults = $this->results->isNotEmpty();
        } else {
            $this->hasResults = false;
        }
    }

    public function render()
    {
        return view('livewire.search-autocomplete');
    }
}
