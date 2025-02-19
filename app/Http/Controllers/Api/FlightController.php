<?php

namespace App\Http\Controllers\api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
    public function index()
    {
        return (response()->json(Flight::All(), 200));
    }

    public function show(string $id)
    {
        return (response()->json(Flight::find($id), 200));
    }

    public function store(Request $request)
    {
        $flight = Flight::create(
            [
                "date" => $request->date,
                "departure" => $request->departure,
                "arrival" => $request->arrival,
                "airship_id" => $request->airshipId,
                "available" => $request->available
            ]
        );

        if ($flight->airship->seats != 0 && !$flight->available)
        {
            $flight->update(
                [
                    "available" => 1
                ]
            );
        }
        return (response()->json($flight, 200));
    }

    public function update(Request $request, string $id)
    {
        $flight = Flight::find($id);
        $flight->update(
            [
                "date" => $request->date,
                "departure" => $request->departure,
                "arrival" => $request->arrival,
                "airship_id" => $request->airshipId,
                "available" => $request->available
            ]
        );

        if ($flight->airship->seats != 0 && !$flight->available)
        {
            $flight->update(
                [
                    "available" => 1
                ]
            );
        }
        return (response()->json($flight, 200));
    }

    public function destroy(string $id)
    {
        Flight::find($id)->delete();
    }
}