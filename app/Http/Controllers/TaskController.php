<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{


    public function index()
{
    $tasks = Task::where('user_id', Auth::id())->get();
    return view('tasks.index', compact('tasks'));
}

    public function edit(Task $task)
{
    return view('tasks.edit', compact('task'));
}


public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'title' => 'required|string|max:255',
    ]);

    // Create a new task and assign it to the logged-in user
    Task::create([
        'user_id' => Auth::id(), // 🔑 Associate task with the current user
        'title' => $request->title,
        'description' => $request->description ?? 'No description',
        'completed' => false,
    ]);

    // Redirect to the tasks list
    return redirect()->route('tasks.index');
}
    public function update(Task $task)
    {
        // Toggle the completed status of the task
        $task->update(['completed' => !$task->completed]);

        // Redirect back to the tasks list
        return redirect()->route('tasks.index');  // Redirect to the tasks index after updating
    }

    public function destroy(Task $task)
    {
        // Delete the task
        $task->delete();

        // Redirect back to the tasks list
        return redirect()->route('tasks.index');  // Redirect to tasks list after deletion
    }
}
