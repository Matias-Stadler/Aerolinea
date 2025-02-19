<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\FlightController;
use App\Http\Controllers\api\AircraftController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/aircraft", [AircraftController::class, "store"])->name("apiaircraftstore");
Route::get("/aircraft", [AircraftController::class, "index"])->name("apiaircraftindex");
Route::get("/aircraft/{id}", [AircraftController::class, "show"])->name("apiaircraftshow");
Route::put("/aircraft/{id}", [AircraftController::class, "update"])->name("apiaircraftupdate");
Route::delete("/aircraft/{id}", [AircraftController::class, "destroy"])->name("apiaircraftdestroy");

Route::post("/flights", [FlightController::class, "store"])->name("apiflightstore");
Route::get("/flights", [FlightController::class, "index"])->name("apiflightindex");
Route::get("/flights/{id}", [FlightController::class, "show"])->name("apiflightshow");
Route::put("/flights/{id}", [FlightController::class, "update"])->name("apiflightupdate");
Route::delete("/flights/{id}", [FlightController::class, "destroy"])->name("apiflightdestroy");