<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\RoomsController;
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
    return Inertia::render('App', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/plantImages', [PlantsController::class, 'loadImage']);
Route::put('/plants/cast-water', [PlantsController::class, 'castWater'])->name('plants.castWater');
Route::resource('plants', PlantsController::class);
Route::resource('rooms', RoomsController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');
});
