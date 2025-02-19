<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\FlightController;
use App\Http\Controllers\api\AirshipController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/airships", [AirshipController::class, "store"])->name("apiairshipstore");
Route::get("/airships", [AirshipController::class, "index"])->name("apiairshipindex");
Route::get("/airships/{id}", [AirshipController::class, "show"])->name("apiairshipshow");
Route::put("/airships/{id}", [AirshipController::class, "update"])->name("apiairshipupdate");
Route::delete("/airships/{id}", [AirshipController::class, "destroy"])->name("apiairshipdestroy");

Route::post("/flights", [FlightController::class, "store"])->name("apiflightstore");
Route::get("/flights", [FlightController::class, "index"])->name("apiflightindex");
Route::get("/flights/{id}", [FlightController::class, "show"])->name("apiflightshow");
Route::put("/flights/{id}", [FlightController::class, "update"])->name("apiflightupdate");
Route::delete("/flights/{id}", [FlightController::class, "destroy"])->name("apiflightdestroy");