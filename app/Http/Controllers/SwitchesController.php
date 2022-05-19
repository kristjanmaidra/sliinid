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
        return Inertia::render('Switches/Index', [
            'switches' => Switches::all()->map(function($switches) {
                return [
                    'ip' => $switches->ip,
                    'name' => $switches->name,
                    'username' => $switches->username,
                    'password' => $switches->password,
                    'model' => $switches->model,
                    'devices' => $switches->devices,
                    'switch_ports' => $switches->switch_ports,
                    'description' => $switches->description,
                    'ports' => $switches->ports,
                    'image' => asset('storage/'. $switches->image),
                ];
            })
        ]);
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
            'ip' => $request->ip,
            'name' => $request->name,
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
        return Inertia::render('Switches/Edit', [
            'switches' => [
                'id' => $switches->id,
                'ip' => $switches->ip,
                'name' => $switches->name,
                'username' => $switches->username,
                'password' => $switches->password,
                'model' => $switches->model,
                'devices' => $switches->devices,
                'switch_ports' => $switches->switch_ports,
                'description' => $switches->description,
                'ports' => $switches->ports,
                'image' => $switches->image,
                ]
            ]);
    }

    
    public function update(Request $request, Switches $switches)
    {
        $switches->update($request->validate([
            'ip' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'model' => 'required',
            'image' => 'required',
            'devices' => 'required',
            'switch_ports' => 'required',
            'ports' => 'required',
            'description' => 'required',
        ]));

        return Redirect::back();

    }

    
    public function destroy(Switches $switches)
    {
        $switches->delete();
        return redirect()->back();
    }
}
