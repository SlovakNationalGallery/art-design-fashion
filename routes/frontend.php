<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/exhibition/{id}', function ($id) {
    return Inertia::render('Frontend/Exhibition');
});

Route::get('/cabinet/{id}', function ($id) {
    return Inertia::render('Frontend/Cabinet');
});

Route::get('/item/{id}', function ($id) {
    return Inertia::render('Frontend/Item');
});