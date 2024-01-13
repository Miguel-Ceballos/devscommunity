<?php

namespace App\Livewire;

use Livewire\Component;

class Search extends Component
{

    public $term;

    public function readForm()
    {
        $this->dispatch('searchTerm', $this->term);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
