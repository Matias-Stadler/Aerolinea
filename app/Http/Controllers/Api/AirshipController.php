<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Airship;
use Illuminate\Http\Request;

class AirshipController extends Controller
{
    public function index()
    {
        return (response()->json(Airship::All(), 200));
    }

    public function show(string $id)
    {
        return response()->json(Airship::find($id), 200);
    }

    public function store(Request $request)
    {
        if ($request->seats < 0 || $request->seats > 200)
            return (response("Incorrect parameters", 400));
        $ship = Airship::create(
            [
                "name" => $request->name,
                "seats" => $request->seats
            ]
        );
        
        return (response()->json($ship, 200));
    }

    public function update(Request $request, string $id)
    {
        $ship = Airship::find($id);
        $ship->update(
            [
                "name" => $request->name,
                "seats" => $request->seats
            ]
        );

        return (response()->json($ship, 200));
    }

    public function destroy(string $id)
    {
        Airship::find($id)->delete();
    }
}
