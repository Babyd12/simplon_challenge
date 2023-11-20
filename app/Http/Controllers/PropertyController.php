<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\SearchPropertiesRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchPropertiesRequest $request)
    {   
            $query = Property::query();
            if($request->has('price') ) {
                $query = $query->where('price', '<=', $request->input('price'));
            }
           $properties = Property::paginate(16);
           return view('property.index', [
            'properties' => $query -> paginate(16),
            'input' => $request -> validated()
           ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, Property $property)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
