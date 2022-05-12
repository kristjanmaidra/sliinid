<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\SwitchBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SwitchBoardController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create(Location $location)
    {
        return Inertia::render('Switchboards/Create', [
            'location' => $location
        ]);
    }

    public function store(Location $location, Request $request)
    {
        $location->switchboards()->create([
            'name' => $request->name
        ]);

        return Redirect::route('locations.show', $location);

    }

    
    public function show(SwitchBoard $switchboard)
    {
        // dd($switchboard->switches);
        return Inertia::render('Switchboards/Show', [
            'switchboard' => $switchboard,
            'switches' => $switchboard->switches,
        ]);
    }

    
    public function edit(SwitchBoard $switchboard)
    {
        return Inertia::render('Switchboards/Edit', compact('switchboard'));
        // return Inertia::render('Switchboards/Edit', [
        //     'switchboard' => [
        //         'id' => $switchboard->id,
        //         'name' => $switchboard->name,
        //     ],
        // ]);
    }

    
    public function update(Request $request, SwitchBoard $switchboard)
    {
        // $data = upda

        // $switchboard->update($request->validate([
        //     'name' => 'required',
        // ]));
        // return Redirect::back();
    }

    
    public function destroy(SwitchBoard $switchboard)
    {
        $switchboard->delete();
        return Redirect::back();
    }
}
