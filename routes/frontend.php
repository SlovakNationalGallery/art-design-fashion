<?php

use App\Models\Cabinet;
use App\Models\Exhibition;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/exhibitions/{id}', function ($id) {
    $exhibition = Exhibition::with('cabinets')->findOrFail($id);
    return Inertia::render('Frontend/Exhibition', compact('exhibition'));
})->name('exhibition');

Route::get('/cabinets/{id}', function ($id) {
    $cabinet = Cabinet::findOrFail($id);
    return Inertia::render('Frontend/Cabinet', compact('cabinet'));
})->name('cabinet');

Route::get('/items/{id}', function ($id) {
    return Inertia::render('Frontend/Item', compact('id'));
})->name('item');