<?php

namespace App\Http\Controllers;

use App\Models\Harbour;
use App\Models\Location;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class LocationController extends Controller
{
    
    public function index()
    {
        return Inertia::render('Locations/Index', [
            'locations' => Location::all()->map(function($location) {
                return [
                    'id' => $location->id,
                    'name' => $location->name,
                ];
            })           
        ]);
    }

    
    public function create()
    {
        return Inertia::render('Locations/Create', [
            'harbours' => Harbour::all()
        ]);
    }

    
    public function store(Request $request)
    {
        // Location::create([
        //     'name' => Request::input('name'),
        //     'harbour_id' => Request::input('harbour'),
        // ]);

        Location::create(
            Request::validate([
                'name' => ['required'],
                'harbour_id' => ['nullable', Rule::exists('harbours', 'id')]
            ]));

        return Redirect::route('locations.index');
    }

    
    public function show(Location $location)
    {
        //
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
}
