<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocalShopController;
use App\Http\Controllers\PlantImageController;
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
})->name('homepage');

Route::get('/terms-of-service', function () {
    return Inertia::render('tos/TermsOfService');
})->name('tos');

Route::get('/plantImages', [PlantsController::class, 'loadImage']);
Route::put('/plants/cast-water', [PlantsController::class, 'castWater'])->name('plants.castWater');
Route::put('/plants/snooze-water', [PlantsController::class, 'snoozeWater'])->name('plants.snoozeWater');
Route::resource('plants', PlantsController::class);
Route::resource('rooms', RoomsController::class);
Route::get('/local-shop', [LocalShopController::class, 'index'])->name('shops.index');

Route::delete('/plants-image/{id}', [PlantImageController::class, 'destroy'])->name('plantsImage.destroy');
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
