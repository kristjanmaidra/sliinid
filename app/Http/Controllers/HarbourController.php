<?php

namespace App\Http\Controllers;

use App\Models\Harbour;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class HarbourController extends Controller
{
    
    public function index()
    {
        return Inertia::render('Harbours/Index', [
            'harbours' => Harbour::all()->map(function($harbour) {
                return [
                    'id' => $harbour->id,
                    'name' => $harbour->name,
                ];
            })
        ]);
    }

    public function create()
    {
        return Inertia::render('Harbours/Create');
    }

    
    public function store(Request $request)
    {
        Harbour::create([
            'name' => Request::input('name'),
        ]);
        return Redirect::route('harbours.index');
    }

    
    public function show(Harbour $harbour)

    {
        // dd($harbour->locations);
        return Inertia::render('Harbours/Show', [
            'harbour' => $harbour,
            'locations' => $harbour->locations,
        ]);
        


    }
    
    public function edit(Harbour $harbour)
    {
        //
    }

   
    public function update(Request $request, Harbour $harbour)
    {
        //
    }

    
    public function destroy(Harbour $harbour)
    {
        //
    }
}
