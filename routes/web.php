<?php

//use App\Http\Controllers\ListingController;
use \App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;




////all listing
//Route::get('/', [ListingController::class, 'index']);
//
////show create form
//Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
//
////store listing data
//Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
//
////show edit from
//Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
//
////store update listing
//Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
//
////delete listing
//Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
//
////elouent khodesh mifahme ke bayad bere dar listing ha begarde
////single listing
//Route::get('/listings/{listing}', [ListingController::class, 'show']);
//
////manage listings
//Route::get('listing/manage', [ListingController::class, 'manage'])->middleware('auth');
//show register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//create new user
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

//logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//login submit
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest');
