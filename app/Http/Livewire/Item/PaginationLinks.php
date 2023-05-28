<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;

class PaginationLinks extends Component
{
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.item.pagination-links');
    }
}
