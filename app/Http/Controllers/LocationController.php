<?php

namespace App\Http\Controllers;

use App\Models\Harbour;
use App\Models\Location;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    
    public function index()
    {
        // dd($harbours);
        return Inertia::render('Locations/Index', [
            'locations' => Location::all()->map(function($location) {
                return [
                    'id' => $location->id,
                    'name' => $location->name,
                ];
            })
        ]);
    }

    
    public function create(Harbour $harbour)
    {
        return Inertia::render('Locations/Create', [
            'harbour' => $harbour
        ]);
    }

    
    public function store(Harbour $harbour, Request $request)
    {

        $harbour->locations()->create([
            'name' => $request->name
        ]);
    
        return Redirect::route('harbours.show', $harbour);
    }

    
    public function show(Location $location)
    {
        // dd($location);

        return Inertia::render('Locations/Show', [
            'location' => $location,
            'switchboards' => $location->switchboards,
        ]);
    }

   
    public function edit(Location $location)
    {
        //
    }

    
    public function update(Request $request, Location $location)
    {
        //
    }

    
    public function destroy(Location $location)
    {
        //
    }
    public function test(Harbour $harbour, Request $request) 
    {
        // dd($request);
        // $harbour->locations()->create([
        //     'name' => $request->name
        // ]);

        // return redirect()->back();
    }
}
