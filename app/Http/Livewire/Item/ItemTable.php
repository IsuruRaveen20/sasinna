<?php

namespace App\Http\Livewire\Item;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;

class ItemTable extends Component
{
    use WithPagination;

    public $search = '';

    public function resetSearch()
    {
        $this->search = '';
    }

    /**
     * Perform the search.
     *
     * No need to implement any logic here as Livewire
     * will automatically update the results based on the $search property.
     *
     * @return void
     */
    public function search()
    {
        // No need to implement any logic here as Livewire
        // will automatically update the results based on the $search property
    }

    public function render()
    {
        $items = Item::where('status', 0)
            ->where(function ($query) {
                $query->where('code', 'LIKE', "%{$this->search}%")
                    ->orWhere('name', 'LIKE', "%{$this->search}%");
            })
            ->latest()
            ->paginate(5);

        return view('livewire.item.item-table', [
            'items' => $items
        ]);
    }

    /**
     * Get search suggestions based on the search term.
     *
     * @return array
     */
    public function getSuggestions()
    {
        $suggestions = [];

        if (!empty($this->search)) {
            $suggestions = Item::where('code', 'LIKE', "{$this->search}%")
                ->orWhere('name', 'LIKE', "{$this->search}%")
                ->pluck('name', 'code')
                ->toArray();

            // Append code to the suggestion value
            $suggestions = array_map(function ($name, $code) {
                return $name . ' (' . $code . ')';
            }, $suggestions, array_keys($suggestions));
        }

        return $suggestions;
    }
}
