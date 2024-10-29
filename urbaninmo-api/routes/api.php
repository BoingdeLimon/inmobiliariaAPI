<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\RealEstateController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);
Route::get('/register', [UserController::class, 'store']);


Route::get('/real-estates', [RealEstateController::class, 'index']);
Route::post('/real-estates', [RealEstateController::class, 'store']);
Route::put('real-estates/{id}', [RealEstateController::class, 'update']);
Route::delete('/real-estates/{id}', [RealEstateController::class, 'destroy']);

Route::get('addresses', [AddressController::class, 'index']);
Route::post('addresses', [AddressController::class, 'store']);
Route::get('addresses/{id}', [AddressController::class, 'show']);
Route::put('addresses/{id}', [AddressController::class, 'update']);
Route::delete('addresses/{id}', [AddressController::class, 'destroy']);


Route::post('/login', [LoginController::class, 'login']);
