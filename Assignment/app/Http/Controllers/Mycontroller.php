<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelStudent;
class Mycontroller extends Controller
{
    function savedata(Request $request)
    {
        // Assuming your ModelStudent model is used to interact with the database
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|date',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
        ]);

        ModelStudent::create($validatedData);

        return response()->json(['success' => true, 'message' => 'Data saved successfully']);
    }
}
