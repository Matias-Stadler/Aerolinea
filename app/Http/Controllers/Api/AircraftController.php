<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Aircraft;
use Illuminate\Http\Request;

class AircraftController extends Controller
{
    public function index()
    {
        return (response()->json(Aircraft::All(), 200));
    }

    public function show(string $id)
    {
        return response()->json(Aircraft::find($id), 200);
    }

    public function store(Request $request)
    {
        if ($request->seats < 0 || $request->seats > 200)
            return (response("Incorrect parameters", 400));
        $craft = Aircraft::create(
            [
                "name" => $request->name,
                "seats" => $request->seats
            ]
        );
        
        return (response()->json($craft, 200));
    }

    public function update(Request $request, string $id)
    {
        $craft = Aircraft::find($id);
        $craft->update(
            [
                "name" => $request->name,
                "seats" => $request->seats
            ]
        );

        return (response()->json($craft, 200));
    }

    public function destroy(string $id)
    {
        Aircraft::find($id)->delete();
    }
}
