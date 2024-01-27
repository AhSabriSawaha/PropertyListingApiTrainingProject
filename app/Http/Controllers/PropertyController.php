<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Resources\PropertyResource;
use App\Http\Requests\StorePropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PropertyResource::collection(Property::with(['char...','broker'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $validated = $request->validated();
        $property = Property::create($validated);
        $property->characteristic()->create([
            'property_id' => $request->id,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'sqft' => $request->sqft,
            'price_sqft' => $request->price_sqft,
            'property_type' => $request->property_type,
            'status' => $request->status,
        ]);

        $property->load([
            'broker'
        ]);

        return new PropertyResource($property);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return new PropertyResource($property);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $property->update($request->only([
            'broker_id', 'addresss', 'listing_type', 'city', 'zip_code', 'description',
            'build_year'
        ]));
        $property->carateristic()->where('property_id', $property->id)->update($request->only([
            'property_id', 'price', 'bedrooms', 'bathrooms', 'sqft', 'price_sqft',
            'property_type', 'status'
        ]));
        return new PropertyResource($property);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return response()->json([
            'success' => true,
            'message' => 'property has been deleted successfully'
        ]);
    }
}
