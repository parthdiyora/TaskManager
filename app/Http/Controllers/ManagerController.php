<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Manager; // Add this line to import the Manager model
use App\Models\Task;
use App\Models\User;

class ManagerController extends Controller
{


    public function index()
    {
        return view('manager.login');
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

            if ($user->hasRole('manager')) {
                return redirect()->route('manager.dashboard');
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
        $tasks = Task::where('assigned_to', auth()->id())->get();
        return view('manager.dashboard', compact('tasks'));
    }
}
