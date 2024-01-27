<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrokerRequest;
use App\Http\Resources\BrokerResource;
use App\Models\Broker;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BrokerResource::collection(Broker::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrokerRequest $request)
    {
        $validated = $request->validated();

        $broker = Broker::create($validated);

        return new BrokerResource($broker);
    }

    /**
     * Display the specified resource.
     */
    public function show(Broker $broker)
    {
        return new BrokerResource($broker);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBrokerRequest $request, Broker $broker)
    {
        $broker->update($request->only([
            'name', 'address', 'city', 'zip_code, ', 'phone_number', 'logo_path'
        ]));
        return new BrokerResource($broker);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Broker $broker)
    {
        $broker->delete();
        return response()->json([
            'success' => true,
            'message' => 'broker has been deleted from the database'
        ]);
    }
}
