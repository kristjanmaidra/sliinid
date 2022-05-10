<?php

use App\Http\Controllers\TopicController;
use App\Http\Controllers\HarbourController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\LocationController;
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
    // Route::post('/harbours', [HarbourController::class, 'store'])->name('harbours.store');
    Route::get('/harbours/{harbour}', [HarbourController::class, 'show'])->name('harbours.show');
    Route::get('/harbours/{harbour}/location-create', [LocationController::class, 'create'])->name('harbours.location.create');
    Route::post('/harbours/{harbour}/location-create', [LocationController::class, 'store'])->name('harbours.location.store');

    //Locations
    Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('/locations-create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');

    //Cameras
    Route::get('/cameras', [CameraController::class, 'index'])->name('cameras.index');
    Route::get('/cameras-create', [CameraController::class, 'create'])->name('cameras.create');
    Route::post('/cameras', [CameraController::class, 'store'])->name('cameras.store');
    Route::get('/cameras/{camera}/edit', [CameraController::class, 'edit'])->name('cameras.edit');
    Route::post('/cameras/{camera}', [CameraController::class, 'update'])->name('cameras.update');
    Route::delete('/cameras/{camera}', [CameraController::class, 'destroy'])->name('cameras.destroy');
});



// Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
// Route::resource('topics', 'App\Http\Controllers\TopicController');


require __DIR__.'/auth.php';