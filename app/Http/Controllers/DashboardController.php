<?php

namespace App\Http\Controllers;

use App\Models\Harbour;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Index', [
            'harbours' => Harbour::all()->map(function($harbour) {
                return [
                    'id' => $harbour->id,
                    'name' => $harbour->name,
                ];
            })           
        ]);
    }
}
