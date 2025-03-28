<?php

use App\Http\Controllers\ObituaryController;

Route::get('/', function () {
     return view('home');
 });

// Show form
Route::get('/obituaries/create', [ObituaryController::class, 'create'])
     ->name('obituaries.create');

// Handle form submission
Route::post('/obituaries', [ObituaryController::class, 'store'])
     ->name('obituaries.store');

// Show all obituaries
Route::get('/obituaries', [ObituaryController::class, 'index'])
     ->name('obituaries.index');

// Show single obituary
Route::get('/obituaries/{slug}', [ObituaryController::class, 'show'])
     ->name('obituaries.show');

     Route::get('/sitemap.xml', function() {
        $obituaries = \App\Models\Obituary::latest()->get();
        
        return response()->view('sitemap', [
            'obituaries' => $obituaries
        ])->header('Content-Type', 'text/xml');
    });

    Route::get('/', function () {
     return view('welcome');
 });


 // Homepage
 Route::get('/', function () {
     return view('welcome');
 });
 
 // Obituary Routes
 Route::resource('obituaries', ObituaryController::class)->only([
     'index', 'create', 'store', 'show'
 ]);
 
 // Sitemap
 Route::get('/sitemap.xml', function() {
     $obituaries = App\Models\Obituary::all();
     return response()
            ->view('sitemap', ['obituaries' => $obituaries])
            ->header('Content-Type', 'text/xml');
 });