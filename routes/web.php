<?php

use App\Http\Controllers\TopicController;
use App\Http\Controllers\HarbourController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SwitchBoardController;
use App\Http\Controllers\SwitchesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
    Route::get('/topics-create', [TopicController::class, 'create'])->name('topics.create');
    Route::post('/topics', [TopicController::class, 'store'])->name('topics.store');

    //Harbours
    Route::get('/harbours', [HarbourController::class, 'index'])->name('harbours.index');
    Route::get('/harbours-create', [HarbourController::class, 'create'])->name('harbours.create');
    Route::post('/harbours', [HarbourController::class, 'store'])->name('harbours.store');
    Route::get('/harbours/{harbour}', [HarbourController::class, 'show'])->name('harbours.show');

    Route::get('/harbours/{harbour}/location-create', [LocationController::class, 'create'])->name('harbours.location.create');
    Route::post('/harbours/{harbour}/location-create', [LocationController::class, 'store'])->name('harbours.location.store');

    //Locations
    // Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('/locations-create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
    Route::get('/locations/{location}', [LocationController::class, 'show'])->name('locations.show');

    Route::get('/locations/{location}/switchboard-create', [SwitchBoardController::class, 'create'])->name('locations.switchboard.create');
    Route::post('/locations/{location}/switchboard-create', [SwitchBoardController::class, 'store'])->name('locations.switchboard.store');

    //Switchboards
    Route::get('/switchboards-create', [SwitchBoardController::class, 'create'])->name('switchboards.create');
    Route::post('/switchboards', [SwitchBoardController::class, 'store'])->name('switchboards.store');
    Route::get('/switchboards/{switchboard}', [SwitchBoardController::class, 'show'])->name('switchboards.show');

    Route::get('/switchboards/{switchboard}/switches-create', [SwitchesController::class, 'create'])->name('switchboards.switches.create');
    Route::post('/switchboards/{switchboard}/switches-create', [SwitchesController::class, 'store'])->name('switchboards.switches.store');
    
    //Switches
    Route::get('/switches-create', [SwitchesController::class, 'create'])->name('switches.create');
    Route::post('/switches', [SwitchesController::class, 'store'])->name('switches.store');
    Route::get('/switches/{switches}', [SwitchesController::class, 'show'])->name('switches.show');

    Route::get('/switches/{switches}/camera-create', [CameraController::class, 'create'])->name('switches.camera.create');
    Route::post('/switches/{switches}/camera-create', [CameraController::class, 'store'])->name('switches.camera.store');
    
    //Cameras
    Route::get('/cameras', [CameraController::class, 'index'])->name('cameras.index');
    Route::get('/cameras-create', [CameraController::class, 'create'])->name('cameras.create');
    Route::post('/cameras', [CameraController::class, 'store'])->name('cameras.store');
    Route::get('/cameras/{camera}/edit', [CameraController::class, 'edit'])->name('cameras.edit');
    Route::post('/cameras/{camera}', [CameraController::class, 'update'])->name('cameras.update');
    Route::post('/cameras/{camera}', [CameraController::class, 'show'])->name('cameras.show');
    Route::delete('/cameras/{camera}', [CameraController::class, 'destroy'])->name('cameras.destroy');

    // Route::get('/cameras/{camera}/switches-create', [CameraController::class, 'create'])->name('cameras.switches.create');
    // Route::post('/cameras/{camera}/switches-create', [CameraController::class, 'store'])->name('cameras.switches.store');
});






require __DIR__.'/auth.php';