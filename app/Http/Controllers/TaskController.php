<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::with(['assignedTo', 'createdBy'])
            ->when(auth()->user()->hasRole(['manager']), function ($query) {
                return $query->where('assigned_to', auth()->id());
            })
            ->latest()
            ->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::role(['manager'])->get();
        return view('tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'assigned_to' => 'required|exists:users,id'
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => 'pending',
            'assigned_to' => $validated['assigned_to'],
            'created_by' => auth()->id()
        ]);

        return redirect()->route('admin.tasks')->with('success', 'Task created successfully');
    }
}
