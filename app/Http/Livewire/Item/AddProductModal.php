<?php

namespace App\Http\Livewire\Item;

use App\Models\AttributeValue;
use Livewire\Component;

class AddProductModal extends Component
{
    public $name;
    public $description;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
    ];

    /**
     * Render the Livewire component.
     *
     * @return \Illuminate\View\View
     */

    public function render()
    {
        return view('livewire.item.add-product-modal');
    }

    /**
     * Save the product attributes.
     *
     * @param Request $request The HTTP request object.
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save()
    {
        $this->validate();

        $productGroup = AttributeValue::create([
            'name' =>  $this->name,
            'description' => $this->description,
            'atb_id' => 1, // Replace with the actual attribute ID
        ]);

        $this->name = '';
        $this->description = '';

        $this->emit('productGroupAdded', $productGroup->id);
        $this->emit('closeModal');
    }
}
