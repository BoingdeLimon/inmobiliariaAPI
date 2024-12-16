<?php

use App\Livewire\Rentals;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Auth;

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


    Route::get('/admin-dashboard', function () {
        if (Auth::user()->role === 'admin' || Auth::user()->role === 'mod') {
            return view('admin-dash');
        }
        return view('errors.404');
    })->name('admin-dashboard');
});



Route::get('/rental/{id}', function ($id) {
    return view('rental', ['rentalId' => $id]);
})->name('rental.show');


Route::get('/rental/statistics/{id}', function ($rentalId) {
    return view('statistics', ['rentalID' => $rentalId]);
})->name('statistics');


Route::get('/rental/{id}/pdf', [PdfController::class, 'generatePdf']);



Route::fallback(function () {
    return view('errors.404');
});
