<?php

use App\Livewire\Rentals;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/profile', function () {
    return view('profile');
});


Route::get('/rental/{id}', function ($id) {
    return view('rental', ['rentalId' => $id]); 
})->name('rental.show');

Route::get('/', function () {
    return view('home'); 
})->name('Home'); 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
