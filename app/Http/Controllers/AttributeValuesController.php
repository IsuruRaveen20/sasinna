<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValuesController extends Controller
{

    /**
     * Save the attribute value.
     * @param Request $request The HTTP request object.
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Create a new attribute value
        AttributeValue::create([
            'name' => 'name',
            'description' => $validatedData['description'],
            'atb_id' => 1, // Replace with the actual attribute ID
        ]);

        // Redirect or return a response as needed
        return redirect()->back();
    }

    /**
     * Get all product groups.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllProductGroups()
    {
        $productGroups = AttributeValue::all();
        return $productGroups;
    }
}
