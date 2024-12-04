<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function index()
    {
        return view('admin.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            Auth::logout();

            return redirect()->back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function dashboard()
    {
        $users = \App\Models\User::whereKeyNot(Auth::id())->get();
        return view('admin.dashboard', compact('users'));
    }

    public function updateRole(Request $request, $userId)
    {
        $user = \App\Models\User::findOrFail(id: $userId);

        $user->syncRoles($request->role);

        return redirect()->back()->with('success', 'User role updated successfully');
    }
}
