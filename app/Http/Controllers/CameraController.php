<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\Switches;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CameraController extends Controller
{
   
    public function index()
    {
        // $cameras = Camera::with('locations')->get();
        // return Inertia::render('Cameras/Index', compact('cameras'));


        return Inertia::render('Cameras/Index', [
            'cameras' => Camera::all()->map(function($camera) {
                return [
                    'ip' => $camera->ip,
                    'name' => $camera->name,
                    'username' => $camera->username,
                    'password' => $camera->password,
                    'description' => $camera->description,
                    'image' => asset('storage/'. $camera->image),
                    'model' => $camera->model,
                    'price' => $camera->price,
                    'view_angle' => $camera->view_angle,
                    'focus_distance' => $camera->focus_distance,
                ];
            })
        ]);
    }

   
    public function create(Switches $switches)
    {
        return Inertia::render('Cameras/Create', [
            'switches' => $switches
        ]);
    }

    
    public function store(Switches $switches, Request $request)
    {
        // dd($switches);
        $image = $request->file('image')->store('cameras', 'public');
        $switches->cameras()->create([
            'name' => $request->name,
            'ip' => $request->ip,
            'username' => $request->username,
            'password' => $request->password,
            'image' => $image,
            'location' => $request->location,
            'model' => $request->model,
            'price' => $request->price,
            'view_angle' => $request->view_angle,
            'focus_distance' => $request->focus_distance,
            'description' => $request->description,
        ]);
        // return redirect()->back();
        return Redirect::route('switches.show', $switches);
    }


   
    public function show(Camera $camera)
    {
       
    }

   
    public function edit(Camera $camera)
    {
        // return Inertia::render('Cameras/Edit', compact('camera'));
        return Inertia::render('Cameras/Edit', [
            'camera' => [
                'id' => $camera->id,
                'name' => $camera->name,
                'ip' => $camera->ip,
                'username' => $camera->username,
                'password' => $camera->password,
                'image' => $camera->image,
                'location' => $camera->location,
                'model' => $camera->model,
                'price' => $camera->price,
                'view_angle' => $camera->view_angle,
                'focus_distance' => $camera->focus_distance,
                'description' => $camera->description,
                ]
            ]);
            
        }
        
        
    public function update(Request $request, Camera $camera, Switches $switches)
    {

        $camera->update($request->validate([
                'name' => 'required',
                'ip' => 'required',
                'username' => 'required',
                'password' => 'required',
                'image' => 'required',
                'location' => 'required',
                'model' => 'required',
                'price' => 'required',
                'view_angle' => 'required',
                'focus_distance' => 'required',
                'description' => 'required',
            ]));
            
            // if ($request->file('image')) {
            //     $camera->update(['image' => Request::file('image')->store('cameras', 'public')]);
            // }
            
            // if($request->file('image')) {
            //     $post->image = $this->upload($request);

            // return Redirect::route('switches.show', $switches);
            return Redirect::back();
    }

    
    public function destroy(Camera $camera)
    {
        $camera->delete();
        return redirect()->back();
    }
}
