<?php

namespace App\Http\Livewire\Item;

use App\Models\AttributeValue;
use Livewire\Component;
use Illuminate\Support\Collection;

class CreateNewItem extends Component
{
    /**
     * This component only use to refresh the product Groups Dropdown when enter new record using Livewire.
     * Data storing is done by using Controller and routes
     * Only related to the Product Groups dropdown refreshing
     */
    /** @var Collection */
    public $product_groups;

    /** @var array */
    protected $listeners = ['productGroupAdded' => 'refreshProductGroups'];

    /**
     * Mount the Livewire component.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->refreshProductGroups();
    }

    /**
     * Refresh the product groups.
     *
     * @return void
     */
    public function refreshProductGroups(): void
    {
        $this->product_groups = AttributeValue::all();
    }

    /**
     * Render the Livewire component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.item.create-new-item');
    }
}
