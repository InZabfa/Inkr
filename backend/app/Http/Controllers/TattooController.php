<?php

namespace App\Http\Controllers;

use App\Models\Tattoo;
use Illuminate\Http\Request;

class TattooController extends Controller
{
    public function index()
    {
        // Fetch all tattoos
        $tattoos = Tattoo::all();

        return response()->json($tattoos);
    }

    public function store(Request $request)
    {
        // Validate incoming data
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',  // Could be a URL or image path
            'price' => 'required|string',  // Might want to use a numeric type later
            'category' => 'required|string',
            'style' => 'required|string',
            'size' => 'required|string',
            'color' => 'required|string',
            'artist' => 'required|string',
        ]);

        // Create a new tattoo record
        $tattoo = Tattoo::create($data);

        // Return the created record with a 201 status code
        return response()->json($tattoo, 201);
    }
}
