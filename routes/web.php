<?php

use App\Http\Controllers\CabinetController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Resources\ExhibitionResource;
use App\Models\Cabinet;
use App\Models\Exhibition;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/exhibitions/{id}', function ($id) {
    $exhibition = Exhibition::with('cabinets.media')->findOrFail($id);
    $resource = new ExhibitionResource($exhibition);
    return Inertia::render('Frontend/Exhibition', compact('resource'));
})->name('exhibitions.show');

Route::get('/cabinets/{id}', function ($id) {
    $cabinet = Cabinet::findOrFail($id);
    return Inertia::render('Frontend/Cabinet', compact('cabinet'));
})->name('cabinets.show');

Route::get('/items/{id}', function ($id) {
    return Inertia::render('Frontend/Item', compact('id'));
})->name('items.show');

Route::middleware('admin', 'inertia:admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');

        Route::resource('exhibitions', ExhibitionController::class);
        Route::resource('cabinets', CabinetController::class);

        Route::mediaLibrary();
    });