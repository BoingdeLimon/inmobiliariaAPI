<?php

use App\Livewire\Rentals;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/profile', function () {
//     return view('profile');
// });

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
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
        return view('profile');
    })->name('profile');
});
Route::get('/admin-dashboard', function () {
    return view('admin-dash');
})->name('admin-dashboard');
Route::get('/statistics', function () {
    return view('statistics'); 
})->name('statistics'); 
Route::get('/rental/{id}/pdf', [PdfController::class, 'generatePdf']);
