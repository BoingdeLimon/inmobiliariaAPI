<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\RealEstateController;
use App\Http\Controllers\UserController;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'login']);
Route::get('/users', [UserController::class, 'index']);

Route::get('/seachEmail', [UserController::class, 'searchEmail']);

Route::get('/real-estates', [RealEstateController::class, 'index']);
Route::post('/real-estates', [RealEstateController::class, 'store']);
Route::put('real-estates/{id}', [RealEstateController::class, 'update']);
Route::delete('/real-estates/{id}', [RealEstateController::class, 'destroy']);

Route::get('addresses', [AddressController::class, 'index']);
Route::post('addresses', [AddressController::class, 'store']);
Route::get('addresses/{id}', [AddressController::class, 'show']);
Route::put('addresses/{id}', [AddressController::class, 'update']);
Route::delete('addresses/{id}', [AddressController::class, 'destroy']);



// ! ENDPOINTS QUE OCUPA NEXT   
// ! - Oliver

//* Para AUTH
Route::post('/loginAuthApi', [LoginController::class, 'loginAuthApi']);
Route::post('/register', [UserController::class, 'store']);

// * Para RealEstates
Route::post("/listAllRealEstates", [RealEstateController::class, 'listAllRentals']);
Route::post("/searchRealEstate", [RealEstateController::class, 'searchRealEstate']);
Route::post("/filterRentals", [RealEstateController::class, 'filterRentals']);


//  Solo usuario autenticado puede crear, editar y eliminar
Route:: 
middleware(['auth:sanctum'])->
post("/newRental", [RealEstateController::class, 'newRental']);

Route:: 
middleware(['auth:sanctum'])->
post("/editRental", [RealEstateController::class, 'editRental']);

Route:: 
middleware(['auth:sanctum'])->
post("/deleteRental", [RealEstateController::class, 'deleteRental']);


// * Para fotos 
Route::get('/listAllPhotos', [PhotosController::class, 'index']);

Route::post('/deleteAllPhotos', [PhotosController::class, 'deleteAllPhotos']);

Route::post('/editPhoto', [PhotosController::class, 'updatePhoto']);

Route::post('/createPhoto', [PhotosController::class, 'store']);


//* Para address

Route::post('/listAllAddress', [AddressController::class, "index"]);

Route::post('/deleteAddress', [AddressController::class, "destroy"]);

Route::post('/editAddress', [AddressController::class, "update"]);



// * Para messages

Route::post('/showMessagesByUser', [MessagesController::class, "showMessagesByUser"]);

Route::get('/showAllMessages', [MessagesController::class, "showAllMessages"]);

Route::post('/newMessage', [MessagesController::class, "newMessage"]);

Route::post('/deleteMessage', [MessagesController::class, "deleteMessage"]);




