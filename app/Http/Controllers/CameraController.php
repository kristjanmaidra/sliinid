<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class CameraController extends Controller
{
   
    public function index()
    {
        return Inertia::render('Cameras/Index', [
            'cameras' => Camera::all()->map(function($camera) {
                return [
                    'id' => $camera->id,
                    'ip' => $camera->ip,
                    'name' => $camera->name,
                    'description' => $camera->description,
                    'image' => asset('storage/'. $camera->image),
                    'model' => $camera->model,
                    'switche_id' => $camera->switche_id,
                    'price' => $camera->price,
                    'view_angle' => $camera->view_angle,
                    'focus_distance' => $camera->focus_distance,
                ];
            })
        ]);
    }

   
    public function create()
    {
        return Inertia::render('Cameras/Create');
    }

    
    public function store(Request $request)
    {
        $image = Request::file('image')->store('cameras', 'public');
        Camera::create([
            'name' => Request::input('name'),
            'ip' => Request::input('ip'),
            'image' => $image,
            'model' => Request::input('model'),
            'price' => Request::input('price'),
            'view_angle' => Request::input('view_angle'),
            'focus_distance' => Request::input('focus_distance'),
            'description' => Request::input('description'),
        ]);
        return Redirect::route('cameras.index');
    }

   
    public function show(Camera $camera)
    {
        //
    }

   
    public function edit(Camera $camera)
    {
        return Inertia::render('Cameras/Edit', compact('camera'));
        // return Inertia::render('Cameras/Edit', [
        //     'camera' => [
        //         'id' => $camera->id,
        //         'name' => $camera->name,
        //         'description' => $camera->description,
        //         'ip' =>  $camera->ip,
        //         'image' => $camera->image,
        //         'model' => $camera->model,
        //         'price' => $camera->price,
        //         'view_angle' => $camera->view_angle,
        //         'focus_distance' => $camera->focus_distance,
        //     ]
        // ]);
    }

 
    public function update(Request $request, Camera $camera)
    {

        $data = Request::validate([
                'name' => ['required'],
                'ip' => ['required'],
                'image' => ['required'],
                'model' => ['required'],
                'price' => ['required'],
                'view_angle' => ['required'],
                'focus_distance' => ['required'],
                'description' => ['required'],
            ]);

            $camera->update($data);

        // $camera->update([
        //     'name' => $request->name,
        //     'ip' => $request->ip,
        //     'image' => $request->image,
        //     'model' => $request->model,
        //     'price' => $request->price,
        //     'view_angle' => $request->view_angle,
        //     'focus_distance' => $request->focus_distance,
        //     'description' => $request->description,
        // ]);
            return Redirect::route('cameras.index');
    }

    
    public function destroy(Camera $camera)
    {
        $camera->delete();
        return Redirect::route('cameras.index')->with('success', 'Kaamera eemaldatud.');
        // return Redirect::route('cameras.index');
    }
}
