<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'errors' => [
                    'email' => ['The provided credentials are incorrect.'],
                ],
            ], 422);
        }
     
        return response()->json([
            'token' => $user->createToken('user-token')->plainTextToken,
        ]);
    }   

    public function managerDetail($id)
    {   
        $manager = User::select('id', 'name', 'email', 'created_at', 'updated_at')->whereHas('roles', function ($query) {
            $query->where('name', 'manager');
        })->find($id);

        if (!$manager) {
            return response()->json(['error' => 'Manager not found'], 404);
        }

        return response()->json($manager);
    }
}
