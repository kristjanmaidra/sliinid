<?php

namespace App\Http\Controllers;

use App\Models\SwitchBoard;
use App\Models\Switches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SwitchesController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function create(SwitchBoard $switchboard)
    {
        return Inertia::render('Switches/Create', [
            'switchboard' => $switchboard
        ]);
    }

    
    public function store(SwitchBoard $switchboard, Request $request)
    {
        $image = $request->file('image')->store('switches', 'public');
        $switchboard->switches()->create([
            'name' => $request->name,
            'ip' => $request->ip,
            'username' => $request->username,
            'password' => $request->password,
            'model' => $request->model,
            'devices' => $request->devices,
            'switch_ports' => $request->switch_ports,
            'description' => $request->description,
            'ports' => $request->ports,
            'image' => $image,
        ]);

        return Redirect::route('switchboards.show', $switchboard);
    }
    
    public function show(Switches $switches)
    {
        // dd($switches);
        return Inertia::render('Switches/Show', [
            'switches' => $switches,
            'cameras' => $switches->cameras,
        ]);
    }

   
    public function edit(Switches $switches)
    {
        //
    }

    
    public function update(Request $request, Switches $switches)
    {
        //
    }

    
    public function destroy(Switches $switches)
    {
        //
    }
}
