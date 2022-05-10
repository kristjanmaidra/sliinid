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
        $harbours = Harbour::all();
        // dd($harbours);
        return Inertia::render('Locations/Index', [
            'locations' => Location::with('harbours')->get()
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

        // return redirect()->back();
        

        return Redirect::route('harbours.show', $harbour);
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
    public function test(Harbour $harbour, Request $request) 
    {
        // dd($request);
        // $harbour->locations()->create([
        //     'name' => $request->name
        // ]);

        // return redirect()->back();
    }
}
